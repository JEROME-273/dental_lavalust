<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Appointments - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        .cancelled-container {
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
        .reason-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9rem;
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <?php include APP_DIR.'views/includes/admin/header.php'; ?>
    
    <div class="container">
        <div class="cancelled-container">
            <div class="page-header">
                <h3 class="page-title">
                    <i class="bi bi-calendar-x me-2"></i>Cancelled Appointments
                </h3>
                <a href="<?=site_url('adminpage');?>" class="back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Original Date</th>
                            <th>Original Time</th>
                            <th>Service</th>
                            <th>Reason</th>
                            <th>Cancelled On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($cancelled_appointments)): ?>
                            <?php foreach ($cancelled_appointments as $appointment): ?>
                                <tr>
                                    <td><?= htmlspecialchars($appointment['fname'] . ' ' . $appointment['lname']) ?></td>
                                    <td><?= htmlspecialchars($appointment['email']) ?></td>
                                    <td><?= date('F d, Y', strtotime($appointment['appointment_date'])) ?></td>
                                    <td><?= date('h:i A', strtotime($appointment['appointment_time'])) ?></td>
                                    <td><?= htmlspecialchars($appointment['service_name']) ?></td>
                                    <td>
                                        <span class="reason-badge">
                                            <?= htmlspecialchars($appointment['cancellation_reason']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('F d, Y h:i A', strtotime($appointment['cancelled_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No cancelled appointments found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>