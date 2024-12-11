<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
    include APP_DIR.'views/includes/admin/header.php';
    ?>
    <div class="container mt-5">
        <h3>Appointments</h3>

        <!-- Search Form -->
        <form method="POST" action="<?= site_url('adminpage') ?>" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search_patient" class="form-control" placeholder="Search by Patient Name" 
                        value="<?= isset($search_patient) ? htmlspecialchars($search_patient) : '' ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="search_service" class="form-control" placeholder="Search by Service" 
                        value="<?= isset($search_service) ? htmlspecialchars($search_service) : '' ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="search_status" class="form-control" placeholder="Search by Status" 
                        value="<?= isset($search_status) ? htmlspecialchars($search_status) : '' ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>


        <!-- Display Appointments -->
        <table class="table table-striped">
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
