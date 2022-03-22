<!-- header and footer content  -->
<?php $this->extend('template/layout'); ?>
<?php $this->section('content'); ?>


<!-- main content start here  -->
<h2 class="page-header mt-3">Edit Job Listing</h2>
<form class="mb-3 mt-3" action="<?= base_url('/update/'. $job['id'])?>" method="POST">
    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" value="<?php echo $job['company']; ?>">
    </div>
    
    <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="job_title" value="<?php echo $job['job_title'] ?>">
    </div>

    <label for="category">Choose Category</label>
    <select name="category" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category) : ?>
            <?php if ($job['category_id'] == $category['id']) : ?>
            <option value="<?php echo $category['id']; ?>" selected><?php echo $category['name'] ?></option>
            <?php else : ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        
    <div class="form-group">
        <label>Description</label>
        <textarea type="text" class="form-control" name="description"><?php echo $job['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" class="form-control" name="location" value="<?php echo $job['location'] ?>">
    </div>
    <div class="form-group">
        <label>Salary</label>
        <input type="text" class="form-control" name="salary" value="<?php echo $job['salary']?>">
    </div>
    <div class="form-group">
        <label>Contact User</label>
        <input type="text" class="form-control" name="contact_user" value="<?php echo $job['contact_user'] ?>">
    </div>
    <div class="form-group mb-3">
        <label>Contact Email</label>
        <input type="text" class="form-control" name="contact_email" value="<?php echo $job['contact_email'] ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="submit" />
</form>

<?php $this->endSection(); ?>