<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Gayoso Dental Clinic</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 2rem;
            margin-bottom: 40px;
        }
        .card-header {
            background: none;
            border: none;
            text-align: center;
            padding-bottom: 1.5rem;
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 600;
        }
        .form-section {
            margin-bottom: 2rem;
        }
        .section-title {
            color: #2c3e50;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9ecef;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 2.5rem;
            border: 2px solid #e9ecef;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
        }
        .input-group {
            position: relative;
            margin-bottom: 1rem;
        }
        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 4;
        }
        .btn-register {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .login-link a:hover {
            color: #0056b3;
        }
        .invalid-feedback {
            font-size: 0.85rem;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create an Account</div>
                    <div class="card-body">
                        <?php flash_alert(); ?>
                        <form id="regForm" method="POST" action="<?=site_url('auth/register');?>">
                            <?php csrf_field(); ?>
                            
                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-person-badge me-2"></i>Personal Information</h5>
                                <div class="input-group">
                                    <i class="bi bi-person"></i>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-person-fill"></i>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-person-fill"></i>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-envelope"></i>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-telephone"></i>
                                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-geo-alt me-2"></i>Address Information</h5>
                                <div class="input-group">
                                    <i class="bi bi-house"></i>
                                    <input type="text" class="form-control" name="street" placeholder="Street Address" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-geo"></i>
                                    <input type="text" class="form-control" name="barangay" placeholder="Barangay" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-building"></i>
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-pin-map"></i>
                                    <input type="text" class="form-control" name="zip_code" placeholder="ZIP Code" required>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-shield-lock me-2"></i>Account Security</h5>
                                <div class="input-group">
                                    <i class="bi bi-lock"></i>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="input-group">
                                    <i class="bi bi-lock-fill"></i>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-register">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </form>

                        <div class="login-link">
                            Already have an account? <a href="<?=site_url('auth/login');?>">Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>