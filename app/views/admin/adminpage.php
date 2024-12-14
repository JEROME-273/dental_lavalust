<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        .container { margin-top: 40px; }
        .search-container { margin-bottom: 20px; }
        .search-container input { 
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .table { margin-bottom: 30px; }
        .btn-sm { margin: 0 2px; }
    </style>
</head>
<body>
    <?php include APP_DIR.'views/includes/admin/header.php'; ?>
    
    <div class="container">
        <h3 class="mb-4"><i class="bi bi-calendar-check me-2"></i>Appointments</h3>
        
        <div class="search-container">
            <input type="text" id="searchInput" class="form-control" placeholder="Search appointments...">
        </div>

        <!-- Today's Appointments -->
        <h4>Today's Appointments</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="today-appointments">
                    <?php 
                    $today = date('Y-m-d');
                    $hasTodayAppointments = false;
                    foreach ($appointments as $appointment):
                        if (date('Y-m-d', strtotime($appointment['appointment_date'])) == $today):
                            $hasTodayAppointments = true;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($appointment['appoint_id']) ?></td>
                            <td><?= htmlspecialchars($appointment['fname'] . ' ' . $appointment['lname']) ?></td>
                            <td><?= date('F d, Y', strtotime($appointment['appointment_date'])) ?></td>
                            <td><?= date('h:i A', strtotime($appointment['appointment_time'])) ?></td>
                            <td><?= htmlspecialchars($appointment['service_name']) ?></td>
                            <td><span id="status-<?= $appointment['appoint_id'] ?>"><?= htmlspecialchars($appointment['status']) ?></span></td>
                            <td>
                                <?php if ($appointment['status'] !== 'Done'): ?>
                                    <button class="btn btn-success btn-sm update-status" data-id="<?= $appointment['appoint_id'] ?>" data-status="Done">Done</button>
                                    <button class="btn btn-warning btn-sm update-status" data-id="<?= $appointment['appoint_id'] ?>" data-status="Postponed">Postponed</button>
                                    <button class="btn btn-info btn-sm update-status" data-id="<?= $appointment['appoint_id'] ?>" data-status="Follow Up">Follow Up</button>
                                <?php else: ?>
                                    <span class="badge bg-success">Completed</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php 
                        endif;
                    endforeach;
                    if (!$hasTodayAppointments):
                    ?>
                        <tr><td colspan="7" class="text-center">No appointments for today</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- All Appointments -->
        <h4>All Appointments</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="all-appointments">
                    <?php if (!empty($appointments)): ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= htmlspecialchars($appointment['appoint_id']) ?></td>
                                <td><?= htmlspecialchars($appointment['fname'] . ' ' . $appointment['lname']) ?></td>
                                <td><?= date('F d, Y', strtotime($appointment['appointment_date'])) ?></td>
                                <td><?= date('h:i A', strtotime($appointment['appointment_time'])) ?></td>
                                <td><?= htmlspecialchars($appointment['service_name']) ?></td>
                                <td><?= htmlspecialchars($appointment['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center">No appointments found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var searchValue = $(this).val().toLowerCase();
                
                $("#today-appointments tr, #all-appointments tr").each(function() {
                    var patientName = $(this).find('td:eq(1)').text().toLowerCase();
                    var service = $(this).find('td:eq(4)').text().toLowerCase();
                    var status = $(this).find('td:eq(5)').text().toLowerCase();
                    
                    var matchFound = patientName.indexOf(searchValue) > -1 
                        || service.indexOf(searchValue) > -1 
                        || status.indexOf(searchValue) > -1;
                    
                    $(this).toggle(matchFound);
                });
            });

            $(document).on('click', '.update-status', function() {
                var appointmentId = $(this).data('id');
                var status = $(this).data('status');
                var buttonCell = $(this).closest('td');

                if (status === 'Done' && !confirm('Are you sure you want to mark this appointment as done?')) {
                    return;
                }

                $.ajax({
                    url: '<?= site_url('admin/update_status') ?>',
                    type: 'POST',
                    data: {
                        id: appointmentId,
                        status: status
                    },
                    success: function(response) {
                        try {
                            var res = JSON.parse(response);
                            if (res.status === 'success') {
                                $('#status-' + appointmentId).text(status);
                                if (status === 'Done') {
                                    buttonCell.html('<span class="badge bg-success">Completed</span>');
                                }
                            } else {
                                alert(res.message || 'Error updating status');
                            }
                        } catch (e) {
                            console.error('Parse error:', e);
                            alert('Error processing response');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                        alert('Error updating the status');
                    }
                });
            });
        });
    </script>
</body>
</html>