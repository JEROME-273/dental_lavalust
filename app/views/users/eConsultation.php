<?php
include APP_DIR.'views/includes/users/header.php';
?>

<style>
    .consultation-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
    }
    .consultation-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .page-title {
        color: #333;
        font-size: 2.2rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .page-description {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }
    .checkbox-group {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin: 20px 0;
    }
    .custom-checkbox {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 8px;
        transition: all 0.3s;
    }
    .custom-checkbox:hover {
        background-color: #f8f9fa;
    }
    .custom-checkbox input[type="checkbox"] {
        margin-right: 10px;
    }
    .form-select {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ddd;
    }
    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        border: none;
        font-weight: 500;
        transition: all 0.3s;
    }
    .btn-submit:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
    .modal-content {
        border-radius: 15px;
    }
    .modal-header {
        background-color: #f8f9fa;
        border-radius: 15px 15px 0 0;
    }
</style>

<div class="consultation-container">
    <div class="consultation-card">
        <h1 class="page-title text-center"><i class="bi bi-clipboard2-pulse me-2"></i>E-Consultation</h1>
        <p class="page-description text-center">Please fill in the symptoms you are experiencing.</p>

        <form action="<?php echo site_url('handle-econsultation'); ?>" method="POST">
            <div class="mb-4">
                <label for="symptoms" class="form-label fw-bold">
                    <i class="bi bi-clipboard2-check me-2"></i>Select your symptoms (choose 1-3):
                </label>
                <div class="checkbox-group">
                    <div class="custom-checkbox">
                        <input type="checkbox" name="symptoms[]" value="toothache" id="toothache">
                        <label for="toothache">Toothache</label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" name="symptoms[]" value="bleeding_gums" id="bleeding_gums">
                        <label for="bleeding_gums">Bleeding Gums</label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" name="symptoms[]" value="bad_breath" id="bad_breath">
                        <label for="bad_breath">Bad Breath</label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" name="symptoms[]" value="sensitive_teeth" id="sensitive_teeth">
                        <label for="sensitive_teeth">Sensitive Teeth</label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" name="symptoms[]" value="swollen_gums" id="swollen_gums">
                        <label for="swollen_gums">Swollen Gums</label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" name="symptoms[]" value="jaw_pain" id="jaw_pain">
                        <label for="jaw_pain">Jaw Pain</label>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">
                    <i class="bi bi-clock-history me-2"></i>How long have you been experiencing these symptoms?
                </label>
                <select class="form-select" name="duration" required>
                    <option value="" disabled selected>Select Duration</option>
                    <option value="less_than_a_week">Less than a week</option>
                    <option value="1_week_to_1_month">1 week to 1 month</option>
                    <option value="more_than_1_month">More than 1 month</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">
                    <i class="bi bi-hospital me-2"></i>Have you visited a dentist for this issue before?
                </label>
                <select class="form-select" name="previous_visit" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-submit">
                    <i class="bi bi-send me-2"></i>Submit Consultation
                </button>
            </div>
        </form>
    </div>
</div>

    <?php if (isset($prescription)): ?>
        <!-- Prescription Modal -->
        <div class="modal fade" id="prescriptionModal" tabindex="-1" aria-labelledby="prescriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="prescriptionModalLabel">Prescription</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="prescriptionContent">
                        <?php echo $prescription; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var prescriptionModal = new bootstrap.Modal(document.getElementById('prescriptionModal'));
                prescriptionModal.show();
            });
        </script>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
include APP_DIR.'views/includes/users/footer.php';
?>

