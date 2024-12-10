<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"  href="<?=site_url('adminpage');?>">Gayoso Dental Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('reports');?>">Charts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('users');?>">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('adminpage');?>">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('feeds');?>">Feedbacks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    