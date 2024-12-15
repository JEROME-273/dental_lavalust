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
                                <th>Action</th>
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
                                        <td>
                                            <button class="btn btn-danger btn-sm delete-appointment" 
                                                    data-appointment-id="<?= $appointment['appoint_id'] ?>">
                                                <i class="bi bi-x-circle"></i> Cancel
                                            </button>
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
<!-- Add this modal HTML before the closing body tag -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cancelForm">
                    <input type="hidden" id="appointmentId" name="appointmentId">
                    <div class="mb-3">
                        <label for="cancellationReason" class="form-label">Reason for Cancellation</label>
                        <select class="form-select" id="cancellationReason" name="cancellationReason" required>
                            <option value="">Select a reason</option>
                            <option value="Schedule Conflict">Schedule Conflict</option>
                            <option value="Personal Emergency">Personal Emergency</option>
                            <option value="Health Issues">Health Issues</option>
                            <option value="Transportation Issues">Transportation Issues</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3" id="otherReasonDiv" style="display: none;">
                        <label for="otherReason" class="form-label">Please specify:</label>
                        <textarea class="form-control" id="otherReason" name="otherReason" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmCancel">Confirm Cancellation</button>
            </div>
        </div>
    </div>
</div>

<!-- Update the JavaScript code -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show modal when cancel button is clicked
    document.querySelectorAll('.delete-appointment').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const appointmentId = this.getAttribute('data-appointment-id');
            document.getElementById('appointmentId').value = appointmentId;
            let cancelModal = new bootstrap.Modal(document.getElementById('cancelModal'));
            cancelModal.show();
        });
    });

    // Handle reason selection
    document.getElementById('cancellationReason').addEventListener('change', function() {
        const otherReasonDiv = document.getElementById('otherReasonDiv');
        otherReasonDiv.style.display = this.value === 'Other' ? 'block' : 'none';
    });

    // Handle form submission
    document.getElementById('confirmCancel').addEventListener('click', function() {
        const appointmentId = document.getElementById('appointmentId').value;
        const reasonSelect = document.getElementById('cancellationReason');
        const otherReason = document.getElementById('otherReason');
        let reason = reasonSelect.value;

        if (reason === 'Other') {
            reason = otherReason.value;
        }

        if (!reason) {
            alert('Please select or specify a reason for cancellation');
            return;
        }

        // Send cancellation request
        fetch('<?= site_url('delete-appointment') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `appoint_id=${appointmentId}&reason=${encodeURIComponent(reason)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the row from the table
                document.querySelector(`[data-appointment-id="${appointmentId}"]`)
                    .closest('tr').remove();
                alert('Appointment cancelled successfully');
                bootstrap.Modal.getInstance(document.getElementById('cancelModal')).hide();
            } else {
                alert(data.message || 'Failed to cancel appointment');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while cancelling the appointment');
        });
    });
});
</script>

<?php include APP_DIR.'views/includes/users/footer.php'; ?>