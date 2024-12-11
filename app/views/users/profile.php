<?php
include APP_DIR.'views/includes/users/header.php';
?>
<h1>User Profile</h1>
<div class="container">
    <?php if (!empty($user)): ?>
        <?php foreach ($user as $users): ?>
        <form method="POST" action="<?=site_url('appointments');?>">
            <?php flash_alert(); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone_number" class="form-label">Phone_number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="street" class="form-label">street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="barangay" class="form-label">barangay</label>
                    <input type="text" class="form-control" id="barangay" name="barangay" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="zip_code" class="form-label">city</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="zip_code" class="form-label">zip_code</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </form>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No user data available.</p>
    <?php endif; ?>
</div>