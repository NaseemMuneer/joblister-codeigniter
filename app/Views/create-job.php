<!-- header and footer content  -->
<?php

use App\Models\Categories;

 $this->extend('template/layout'); ?>
<?php $this->section('content'); ?>

<?php
$validation =  \Config\Services::validation(); ?>
<!-- main content start here  -->
<div class=" mt-3">

    <h2 class="page-header">Create Job</h2>

    <form action="<?php echo base_url('/store') ?>" method="POST">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company" value="<?php if (isset($_POST['company'])) echo $_POST['company'] ?>">
            <?php
            if ($validation->hasError('company')) {
            ?><div class="text-danger">
                    <?php echo $validation->getError('company'); ?>
                </div>
            <?php
            } ?>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control" >
                <option value="" selected>Select category</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach; ?>

            </select>
            <?php
            if ($validation->hasError('category')) {
            ?>
                <div class="text-danger">
                    <?php echo $validation->getError('category'); ?>
                </div>
            <?php
            }
            ?>
        </div>

</div>
<div class="form-group">
    <label>Job Title</label>
    <input type="text" class="form-control" name="job_title" value="<?php if (isset($_POST['job_title'])) echo $_POST['job_title'] ?>">
    <?php
    if ($validation->hasError('job_title')) {
    ?> <div class="text-danger">
            <?php echo $validation->getError('job_title'); ?>
        </div>
    <?php
    } ?>
</div>

<div class="form-group">
    <label>Description</label>
    <textarea type="text" class="form-control" name="description"><?php if(isset($_POST['description'])) echo $_POST['description'] ?>
    </textarea>
    <?php
    if ($validation->hasError('description')) {
    ?>
        <div class="text-danger">
            <?php echo $validation->getError('description'); ?>
        </div>
    <?php
    }
    ?>
</div>

<div class="form-group">
    <label>Location</label>
    <input type="text" class="form-control" name="location"
    value="<?php if (isset($_POST['location'])) echo $_POST['location'] ?>">
    <?php
    if ($validation->hasError('location')) {
    ?>
        <div class="text-danger">
            <?php echo $validation->getError('location'); ?>
        </div>
    <?php
    }
    ?>
</div>

<div class="form-group">
    <label>Salary</label>
    <input type="text" class="form-control" name="salary"
    value="<?php if (isset($_POST['salary'])) echo $_POST['salary'] ?>">
    <?php
    if ($validation->hasError('salary')) {
    ?>
        <div class="text-danger">
            <?php echo $validation->getError('salary'); ?>
        </div>
    <?php
    }
    ?>
</div>

<div class="form-group">
    <label>Contact User</label>
    <input type="tel" class="form-control" name="contact_user"
    value="<?php if (isset($_POST['contact_user'])) echo $_POST['contact_user'] ?>">
    <?php
    if ($validation->hasError('contact_user')) {
    ?>
        <div class="text-danger">
            <?php echo $validation->getError('contact_user');?>
        </div>
    <?php
    }
    ?>
</div>

<div class="form-group">
    <label>Contact Email</label>
    <input type="email" class="form-control" name="contact_email"
    value="<?php if (isset($_POST['contact_email'])) echo $_POST['contact_email'] ?>">
    <?php if ($validation->hasError('contact_email')) {
    ?>
        <div class="text-danger">
            <?php echo $validation->getError('contact_email'); ?>
        </div>
    <?php
    }
    ?>
</div>

<input type="submit" class="btn btn-primary" value="Submit" name="submit"/>

</form>
</div>


<?php $this->endSection(); ?>