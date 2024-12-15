<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Gayoso Dental Clinic</title>  
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
        }
        .card-header {
            font-size: 2rem;
            font-weight: 600;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 2rem;
            padding: 0;
            background: none;
            border: none;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
        }
        .input-group {
            position: relative;
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 4;
        }
        .input-group .form-control {
            padding-left: 45px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }
        .forgot-password, .register-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        .forgot-password a, .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .forgot-password a:hover, .register-link a:hover {
            color: #0056b3;
            text-decoration: none;
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .brand-logo img {
            width: 80px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Welcome Back!</div>
        <div class="card-body">
            <?php flash_alert(); ?>
            <form id="logForm" method="POST" action="<?=site_url('auth/login');?>">
                <?php csrf_field(); ?>
                <div class="mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <i class="bi bi-envelope"></i>
                        <input id="email" type="email" class="form-control <?=$LAVA->session->flashdata('is_invalid'); ?>" name="email" required autofocus>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo $LAVA->session->flashdata('err_message'); ?>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <i class="bi bi-lock"></i>
                        <input id="password" type="password" class="form-control" name="password" minlength="8" required>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>
                </div>
                <div class="forgot-password">
                    <a href="<?=site_url('auth/password-reset');?>">Forgot Your Password?</a>
                </div>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="<?=site_url('auth/register');?>">Register here</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(function() {
            var logForm = $("#logForm");
            if (logForm.length) {
                logForm.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 2
                        }
                    },
                    messages: {
                        email: {
                            required: "Please input your email address.",
                            email: "Please enter a valid email address."
                        },
                        password: {
                            required: "Please input your password.",
                            minlength: "Password must be at least 2 characters long."
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>