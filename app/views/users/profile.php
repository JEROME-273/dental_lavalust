<?php
include APP_DIR.'views/includes/users/header.php';
?>
<style>
    .profile-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
    }
    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .profile-header h2 {
        color: #2c3e50;
        font-weight: 600;
        font-size: 2rem;
    }
    .profile-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 0 30px rgba(0,0,0,0.1);
        padding: 40px;
        margin-bottom: 30px;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .info-input {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 1rem;
        color: #495057;
        cursor: default;
        transition: all 0.3s ease;
    }
    .info-input:focus {
        box-shadow: none;
        border-color: #e9ecef;
    }
    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }
    .form-label i {
        color: #6c757d;
    }
    .btn-primary {
        background-color: #0d6efd;
        border: none;
        padding: 12px 30px;
        font-weight: 500;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(13, 110, 253, 0.2);
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
    }
    .modal-content {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        border-radius: 15px 15px 0 0;
        padding: 20px 30px;
    }
    .modal-body {
        padding: 30px;
    }
    .modal-title {
        color: #2c3e50;
        font-weight: 600;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
    .btn-secondary {
        background-color: #6c757d;
        border: none;
        padding: 12px 25px;
        font-weight: 500;
        border-radius: 8px;
    }
    .btn-update {
        background-color: #0d6efd;
        border: none;
        padding: 12px 25px;
        font-weight: 500;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(13, 110, 253, 0.2);
    }
    .btn-update:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
    }
    @media (max-width: 768px) {
        .profile-card {
            padding: 20px;
        }
        .modal-dialog {
            margin: 10px;
        }
    }
</style>

<<div class="profile-container">
    <div class="profile-header">
        <h2><i class=" me-2"></i>User Profile</h2>
    </div>
    <?php if (!empty($user)): ?>
        <div class="profile-card">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-person me-2"></i>Username</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['username']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-person-vcard me-2"></i>First Name</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['first_name']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-person-vcard me-2"></i>Last Name</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['last_name']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-envelope me-2"></i>Email</label>
                    <input type="email" class="form-control info-input" value="<?=htmlspecialchars($user['email']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-telephone me-2"></i>Phone Number</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['phone_number']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-geo-alt me-2"></i>Street</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['street']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-geo-alt me-2"></i>Barangay</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['barangay']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-geo-alt me-2"></i>City</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['city']);?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="bi bi-geo me-2"></i>Zip Code</label>
                    <input type="text" class="form-control info-input" value="<?=htmlspecialchars($user['zip_code']);?>" readonly>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                <i class="bi bi-pencil-square me-2"></i>Update Profile
            </button>
        </div>
    <?php else: ?>
        <div class="alert alert-info">No user data available.</div>
    <?php endif; ?>
</div>

<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">
                    <i class="bi bi-pencil-square me-2"></i>Update Profile
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=site_url('update-profile');?>">
                    <?php flash_alert(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label"><i class="bi bi-person me-2"></i>Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?=htmlspecialchars($user['username']);?>" required>
                        </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?=htmlspecialchars($user['first_name']);?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?=htmlspecialchars($user['last_name']);?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=htmlspecialchars($user['email']);?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?=htmlspecialchars($user['phone_number']);?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street</label>
                        <input type="text" class="form-control" id="street" name="street" value="<?=htmlspecialchars($user['street']);?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" value="<?=htmlspecialchars($user['barangay']);?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?=htmlspecialchars($user['city']);?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?=htmlspecialchars($user['zip_code']);?>" required>
                    </div>
                    <div class="text-end mt-4">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-update">
                            <i class="bi bi-check-lg me-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include APP_DIR.'views/includes/users/footer.php';
?>