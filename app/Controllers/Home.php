<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Files\File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {

        $data = [];
        helper('form');

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[8]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[16]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AdminModel();

                $admin = $model->where('email', $this->request->getVar('email'))
                    ->first();

                if ($this->verifyMyPassword($this->request->getVar('password'), $admin['password'])) {
                    $this->setUserSession($admin);
                    return redirect()->to('/dashboard');
                } else {
                    $data['Flash_message'] = TRUE;
                }
            }
        }
        return view('login', $data);
    }
    public function signup()
    {

        $data = [];
        helper('form');

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[admin.email]',
                'phone' => 'required|min_length[10]|max_length[10]',
                'password' => 'required|min_length[8]|max_length[16]',
                'password_confirm' => 'required|matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new AdminModel();
                $newData = array(
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'phone' => $this->request->getVar('phone'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                );

                if ($model->save($newData)) {
                    $data['Flash_message'] = TRUE;
                    return redirect()->to('/');
                }
            }
        }
        ;
        return view('signup', $data);
    }
    public function dashboard()
    {
        $data = [];
        $model = new AdminModel();

        $data['userData'] = $model->findAll();

        return view('dashboard', $data);
    }

    public function edituser($id)
    {
        $model = new AdminModel();

        if ($this->request->getMethod() == 'post') {
            $newData = array(
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
            );

            if ($model->update($id, $newData)) {
                $data['Flash_message'] = TRUE;
                return redirect()->to('/dashboard');
            }
        }
        $data['userData'] = $model->where('id', $id)->first();
        return view('edituser', $data);
    }
    public function deleteuser($id)
    {
        $model = new AdminModel();

        if ($model->where('id', $id)->delete()) {
            return redirect()->to('/dashboard');
        }
    }

    public function upload($id)
    {

        $data = [];
        $model = new AdminModel();

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'uploadImage' => [
                    'label' => 'image File',
                    'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpeg,image/jpeg,image/png]'
                    . '|max_size[image,1024]'
                ]
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $img = $this->request->getFile('image');

                if (!$img->hasMoved()) {
                    $filepath = WRITEPATH . 'uploads' . $img->store();
                    print_r($filepath);
                    $uploded_fileinfo = new File($filepath);
                    $fileName = esc($uploded_fileinfo->getBasename());


                    $imageData = array(
                        'image' => $fileName
                    );

                    if ($model->update($id, $imageData)) {
                        $data['Flash_message'] = TRUE;
                        return redirect()->to('/dashboard');
                    }

                }
            }


        }

        return view('upload_image', $data);
    }

    private function verifyMyPassword($enterpassword, $databasepassword)
    {
        return password_verify($enterpassword, $databasepassword);
    }

    private function setUserSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'firstname' => $admin['firstname'],
            'lastname' => $admin['lastname'],
            'email' => $admin['email'],
            'isLoggedIn' => true,

        ];
        session()->set($data);
        return true;
    }

    public function exportuserdata()
    {
        $admin_model = new AdminModel();
        $fileName = 'employees.xlsx';
        $spreadsheet = new Spreadsheet();
        $employees = $admin_model->findAll();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'First Name');
        $sheet->setCellValue('C1', 'Last Name');
        $sheet->setCellValue('D1', 'Email');
        $rows = 2;
        foreach ($employees as $val) {
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['firstname']);
            $sheet->setCellValue('C' . $rows, $val['lastname']);
            $sheet->setCellValue('D' . $rows, $val['email']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($fileName));
        flush();
        readfile($fileName);
        exit;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}