<?php
include APP_DIR.'views/templates/header.php';
?>
<body>
    <?php
    include APP_DIR.'views/templates/nav.php';
    ?> 

<div class="container mt-5">
        <h3>Appointments</h3>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo strpos($_SESSION['message'], 'successfully') !== false ? 'success' : 'danger'; ?>">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

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
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($appointment['appointment_id']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['service_name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['status']); ?></td> <!-- Display the status -->
                        <td>
                            <a href="mark_done.php?id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-success btn-sm">Done</a>
                            <a href="mark_postponed.php?id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-warning btn-sm">Postponed</a>
                            <a href="mark_followup.php?id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-info btn-sm">Follow Up</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
    include APP_DIR.'views/templates/footer.php';
    ?> 
</body>
