<!-- header and footer content  -->
<?php $this->extend('template/layout'); ?>
<?php $this->section('content'); ?>

<!-- main content start here  -->
<h2 class="page-header"><?php echo  $job['job_title'] ?> (<?php echo $job['location'] ?>)</h2>

<small>Posted By <?php echo $job['contact_user']; ?> on <?php echo $job['post_date']; ?></small>
<hr>
<p class="lead"><?php echo $job['description']; ?></p>
<ul class="list-group">
    <li class="list-group-item">
        <strong>Company:</strong>
        <?php echo $job['company']; ?>
    </li>
    <li class="list-group-item">
        <strong>Salary:</strong>
        <?php echo $job['salary']; ?>
    </li>
    <li class="list-group-item">
        <strong>Contact Email:</strong>
        <?php echo $job['contact_email']; ?>
    </li>
</ul>
<br><br>
<div class="well">
    <a href="<?= base_url('/edit-job/' . $job['id']) ?>" class="btn btn-primary">Edit</a>
    <?php
    ?>
    <form action="<?= base_url('/delete-job/' . $job['id']) ?> "method="POST" style="display: inline;">
        <input type="hidden" name="del_id" value="<?php echo $job['id'] ?>">
        <input type="submit" class="btn btn-danger" value="Delete">
    </form>
</div>

<a href="/">Go Back</a>

<?php $this->endSection(); ?>
