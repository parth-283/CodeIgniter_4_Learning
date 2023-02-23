<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href='<?php echo base_url() ?>/assets/css/style.css'>
</head>

<body>
    <?php

    $data = session()->get();

    ?>
    <div class="container martop">
        <div class="col-md-6 center_div">
            <p>Welcome <?php echo $data['firstname'] . " " . $data['lastname']  ?> | <a href='<?php echo base_url() ?>/logout'>Logout</a></p>
        </div>

        <div>

            <div>
                <h2>User Data</h2>
            </div>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userData as $key => $val) { ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $val['firstname'] ?></td>
                            <td><?php echo $val['lastname'] ?></td>
                            <td><?php echo $val['phone'] ?></td>
                            <td><?php echo $val['email'] ?></td>
                            <td colspan="2">
                                <a href="<?php echo base_url() ?>/edituser/<?php echo $val['id']  ?>">Edit</a> | <a onclick="return confirm('Are you sure want to delete this recored!')" href="<?php echo base_url() ?>/deleteuser/<?php echo $val['id']  ?>">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>