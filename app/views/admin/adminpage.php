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
        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search_patient" class="form-control" placeholder="Search by Patient Name" 
                        value="<?= isset($_POST['search_patient']) ? htmlspecialchars($_POST['search_patient']) : '' ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="search_service" class="form-control" placeholder="Search by Service" 
                        value="<?= isset($_POST['search_service']) ? htmlspecialchars($_POST['search_service']) : '' ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="search_status" class="form-control" placeholder="Search by Status" 
                        value="<?= isset($_POST['search_status']) ? htmlspecialchars($_POST['search_status']) : '' ?>">
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
                            <td><?= htmlspecialchars($appointment['appointment_id']) ?></td>
                            <td><?= htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']) ?></td>
                            <td><?= date('Y-m-d H:i', strtotime($appointment['appointment_date'])) ?></td>
                            <td><?= htmlspecialchars($appointment['service_name']) ?></td>
                            <td><?= htmlspecialchars($appointment['status']) ?></td>
                            <td>
                                <a href="mark_done.php?id=<?= htmlspecialchars($appointment['appointment_id']) ?>" class="btn btn-success btn-sm">Done</a>
                                <a href="mark_postponed.php?id=<?= htmlspecialchars($appointment['appointment_id']) ?>" class="btn btn-warning btn-sm">Postponed</a>
                                <a href="mark_followup.php?id=<?= htmlspecialchars($appointment['appointment_id']) ?>" class="btn btn-info btn-sm">Follow Up</a>
                                <a href="edit_appointment.php?id=<?= htmlspecialchars($appointment['appointment_id']) ?>" class="btn btn-primary btn-sm">Edit</a>
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
</body>
</html>
