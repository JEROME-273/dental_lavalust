<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../assets/css/style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="<?=base_url();?>public/homepage/style.css"> -->
    <link rel="stylesheet" href="<?=base_url();?>public/admin/style.css">
</head>
<body>
<?php 
    include APP_DIR.'views/includes/admin/header.php';
    ?>
    
    
    <div class="container mt-5">
        <h3>Users</h3>

        <a href="<?=site_url('adminpage');?>">back</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($message as $mess): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($mess['name']); ?></td>
                        <td><?php echo htmlspecialchars($mess['email']); ?></td>
                        <td><?php echo htmlspecialchars($mess['contact']); ?></td>
                        <td><?php echo htmlspecialchars($mess['message']);?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
