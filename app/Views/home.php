<!-- header and footer content  -->
<?php

use App\Models\Categories;
use App\Models\Jobs;

$this->extend('template/layout'); ?>
<?php $this->section('content'); ?>

<?php
if (session()->getFlashdata('success')) {
    echo '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>';
}

?>
<!-- main content start here  -->
<div class="jumbotron p-5 bg-light mt-3 mb-3">

    <h1>Find A Job</h1>
    <form action="<?= base_url('/search/') ?>" method="GET">
        <select name="category" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" class="btn btn-lg btn-success" value="FIND">
    </form>


    <h3>Latest Jobs</h3>
    <div class="row marketing mt-4 mb-4 bg-light">
        <?php foreach ($jobs as $job) : ?>
            <div class="col-md-10 ">
                <h4><?php echo $job['job_title']; ?></h4>
                <p><?php echo $job['description']; ?></p>
            </div>
            <div class="col-md-2">
                <a href="<?= base_url("/view-job/" . $job['id']) ?>" class="btn btn-primary">View</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php $this->endSection(); ?>