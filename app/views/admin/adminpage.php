<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        .container {
            margin-top: 40px;
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
        }
        .search-form {
            margin-bottom: 30px;
        }
        .search-form .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        .search-form .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
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
        .btn-sm {
            padding: 5px 10px;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .container {
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
        <div class="page-header">
            <h3 class="page-title"><i class="bi bi-calendar-check me-2"></i>Appointments</h3>
        </div>

        <!-- Search Form -->
        <form method="POST" action="<?= site_url('adminpage') ?>" class="search-form">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <input type="text" name="search_patient" class="form-control" placeholder="Search by Patient Name" 
                        value="<?= isset($search_patient) ? htmlspecialchars($search_patient) : '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="search_service" class="form-control" placeholder="Search by Service" 
                        value="<?= isset($search_service) ? htmlspecialchars($search_service) : '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="search_status" class="form-control" placeholder="Search by Status" 
                        value="<?= isset($search_status) ? htmlspecialchars($search_status) : '' ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-search me-2"></i>Search</button>
        </form>

        <!-- Display Appointments -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($appointments)): ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= htmlspecialchars($appointment['appoint_id']) ?></td>
                                <td><?= htmlspecialchars($appointment['fname'] . ' ' . $appointment['lname']) ?></td>
                                <td><?= date('Y-m-d H:i', strtotime($appointment['appointData'])) ?></td>
                                <td><?= htmlspecialchars($appointment['service_name']) ?></td>
                                <td><span id="status-<?= $appointment['appoint_id'] ?>"><?= htmlspecialchars($appointment['status']) ?></span></td>
                                <td>
                                    <button class="btn btn-success btn-sm update-status" data-id="<?= $appointment['appoint_id'] ?>" data-status="Done">Done</button>
                                    <button class="btn btn-warning btn-sm update-status" data-id="<?= $appointment['appoint_id'] ?>" data-status="Postponed">Postponed</button>
                                    <button class="btn btn-info btn-sm update-status" data-id="<?= $appointment['appoint_id'] ?>" data-status="Follow Up">Follow Up</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No appointments found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.update-status').on('click', function() {
                var appointmentId = $(this).data('id');
                var status = $(this).data('status');

                $.ajax({
                    url: '<?= site_url('admin/update_status') ?>', // Controller method to handle the request
                    type: 'POST',
                    data: {
                        id: appointmentId,
                        status: status
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.status === 'success') {
                            $('#status-' + appointmentId).text(status);
                            // alert(res.message);
                        } else {
                            // alert(res.message);
                        }
                    },
                    error: function() {
                        alert('Error updating the status.');
                    }
                });
            });
        });
    </script>
</body>
</html>