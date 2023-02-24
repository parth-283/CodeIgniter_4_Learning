<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeIgniter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href='<?php echo base_url() ?>/assets/css/style.css'>
</head>

<body>
    <div class="container martop">
        <div class="col-md-6 center_div">
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="alert alert-danger" role='alert'>
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($Flash_message)): ?>
                <div class="col-12">
                    <div class="alert alert-success" role='alert'>
                        Congratulations! Registered successfully
                    </div>
                </div>
            <?php endif; ?>

            <div>
                <h2>Upload Image</h2>
            </div>
            <form accept="" enctype="multipart/form-data" method="post">
                <div class="mb-3 form-group">
                    <label for="uploadImage" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="uploadImage" name="image">
                </div>
                <button type="submit" class="btn btn-light">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>