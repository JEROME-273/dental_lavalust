<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url();?>public/admin/style.css">
    <style>
        .feedback-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-title {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }
        .back-btn {
            background-color: #6c757d;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
        }
        .back-btn:hover {
            background-color: #5a6268;
            color: white;
            transform: translateX(-3px);
        }
        .table {
            margin: 0;
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background-color: #f8f9fa;
        }
        .table th {
            font-weight: 600;
            color: #2c3e50;
            padding: 15px;
            border-bottom: 2px solid #dee2e6;
        }
        .table td {
            padding: 15px;
            vertical-align: middle;
            color: #666;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            .feedback-container {
                padding: 20px;
            }
            .table-responsive {
                border-radius: 10px;
            }
        }
    </style>
</head>
<body>
    <?php include APP_DIR.'views/includes/admin/header.php'; ?>
    
    <div class="container">
        <div class="feedback-container">
            <div class="page-header">
                <h3 class="page-title"><i class="bi bi-chat-square-text me-2"></i>User Feedback</h3>
                <a href="<?=site_url('adminpage');?>" class="back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="bi bi-person me-2"></i>Name</th>
                            <th><i class="bi bi-envelope me-2"></i>Email</th>
                            <th><i class="bi bi-telephone me-2"></i>Contact</th>
                            <th><i class="bi bi-chat-text me-2"></i>Message</th>
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
        </div>
    </div>
</body>
</html>