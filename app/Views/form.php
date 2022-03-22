<?php $validation =  \Config\Services::validation(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Form VAlidation</h1>


        <form action="/form" method="post">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" value="<?= set_value('email') ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php
                if ($validation->hasError('email')) {
                ?>
                    <div class="text-danger">
                        <?php echo $validation->getError('email'); ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input value="<?= set_value('password') ?>" name="password" type="password" class="form-control" id="exampleInputPassword1">
                <?php
                if ($validation->hasError('password')) {
                ?>
                    <div class="text-danger">
                        <?php echo $validation->getError('password'); ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="mb-3">
                <div class="form-group  mb-3">
                    <label for="exampleInputPassword1" class="form-group">category</label>
                    <select class="form-select" name="category" aria-label="Default select example">
                        <?php foreach ($categories as $cat) : ?>
                            <option <?= set_select('category', $cat) ?> value="<?= $cat ?>"><?= $cat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>