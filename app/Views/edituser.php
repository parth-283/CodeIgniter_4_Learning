<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeIgniter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href='<?php echo base_url() ?>/assets/css/style.css'>
</head>

<body>
    <div class="container martop">
        <div class="col-md-6 center_div">
            <?php if (isset($Flash_message)) : ?>
                <div class="col-12">
                    <div class="alert alert-success" role='alert'>
                        Congratulations! Updated successfully
                    </div>
                </div>
            <?php endif; ?>
            <div>
                <h2>User Update</h2>
            </div>
            <form method="post" action="<?php site_url('/edituser/(:any)') ?>">
                <div class="mb-3 form-group">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="name" name='firstname' value="<?php echo $userData['firstname']; ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name='lastname' value="<?php echo $userData['lastname']; ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name='phone' value="<?php echo $userData['phone'] ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name='email' value="<?php echo $userData['email']; ?>">
                </div>
                <button type="submit" class="btn btn-light">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>