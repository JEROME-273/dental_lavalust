<!-- /users/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url();?>public/homepage/header.css">
    <link rel="stylesheet" href="<?=base_url();?>public/homepage/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        .navbar-text {
            color: white;
            font-size: 0.9rem;
        }
        .nav-link {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .dropdown-toggle::after {
            display: none;
        }
        .username-text {
            color: white;
            font-size: 0.9rem;
        }
        .bi-person-circle {
            font-size: 1.5rem;
        }
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.1);
        }
        .dropdown-item {
            padding: 0.5rem 1.5rem;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <span class="navbar-brand mb-0">Gayoso Dental Clinic</span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('home');?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('services');?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('econsultation');?>">E-Consultation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('appointment');?>">Book Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('FAQs');?>">FAQs</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown d-flex align-items-center">
                <span class="username-text me-2"><?=html_escape(get_username(get_user_id()));?></span>                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="<?=site_url('view-appointments');?>">
                            <i class="bi bi-calendar-check me-2"></i> View Appointments
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?=site_url('user-profile');?>">
                            <i class="bi bi-person-lines-fill me-2"></i> User Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="<?=site_url('auth/logout');?>" onclick="return confirmLogout();">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
function confirmLogout() {
    return confirm("Are you sure you want to log out?");
}
</script>
</body>
</html>