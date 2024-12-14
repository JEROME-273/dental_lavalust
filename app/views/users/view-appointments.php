<?php include APP_DIR.'views/includes/users/header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h3><i class="bi bi-calendar-check me-2"></i>My Appointments</h3>
        </div>
        <div class="card-body">
            <?php if (isset($appointments) && !empty($appointments)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Service</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appointment): ?>
                                <tr>
                                    <td><?= isset($appointment['appointment_date']) ? date('F d, Y', strtotime($appointment['appointment_date'])) : 'N/A' ?></td>
                                    <td><?= isset($appointment['appointment_time']) ? date('h:i A', strtotime($appointment['appointment_time'])) : 'N/A' ?></td>
                                    <td><?= htmlspecialchars($appointment['service_name']) ?></td>
                                    <td><?= htmlspecialchars($appointment['email']) ?></td>
                                    <td>
                                        <span class="badge bg-<?php 
                                            echo match(strtolower($appointment['status'])) {
                                                'pending' => 'warning',
                                                'done' => 'success',
                                                'postponed' => 'danger',
                                                'follow up' => 'info',
                                                default => 'secondary'
                                            };
                                        ?>">
                                            <?= htmlspecialchars($appointment['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>You have no appointments yet.
                    <a href="<?= site_url('appointment') ?>" class="alert-link">Book an appointment now</a>.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include APP_DIR.'views/includes/users/footer.php'; ?>