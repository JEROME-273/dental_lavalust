<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        button {
            background-color: #007bff;
            border: none;
        }

        button:hover {
            background-color: #0056b3;
        }

        h4 {
            margin-top: 1.5rem;
            color: #495057;
        }

        .login-link {
            margin-top: 1rem;
            text-align: center;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <?php flash_alert(); ?>
                            <form id="regForm" method="POST" action="<?=site_url('auth/register');?>">
                                <?php csrf_field(); ?>

                                <h4>Personal Information</h4>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Enter your username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="Enter your first name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Enter your last name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Contact</label>
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="+639999999999" pattern="^\+639\d{9}$" required>
                                </div>

                                <h4>Address</h4>
                                <div class="mb-3">
                                    <label for="street" class="form-label">Street</label>
                                    <input id="street" type="text" class="form-control" name="street" placeholder="Enter your street" required>
                                </div>
                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input id="barangay" type="text" class="form-control" name="barangay" placeholder="Enter your barangay" required>
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input id="city" type="text" class="form-control" name="city" placeholder="Enter your city or municipality" required>
                                </div>
                                <div class="mb-3">
                                    <label for="zip_code" class="form-label">Zip Code</label>
                                    <input id="zip_code" type="text" class="form-control" name="zip_code" placeholder="Enter your zip code" required>
                                </div>

                                <h4>Account Security</h4>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Re-enter your password" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                            <div class="login-link">
                                Already have an account? <a href="<?=site_url('auth/login');?>">Log in here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>