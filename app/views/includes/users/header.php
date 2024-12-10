<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>public/homepage/header.css">
    <link rel="stylesheet" href="<?=base_url();?>public/homepage/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=site_url('home');?>">Gayoso Dental Clinic</a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
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
                    <a class="nav-link" href="<?=site_url('feedback');?>">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('FAQs');?>">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?=html_escape(get_username(get_user_id()));?></a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="<?=site_url('auth/logout');?>" onclick="return confirmLogout();">Logout</a>
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

