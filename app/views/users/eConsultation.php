<?php
include APP_DIR.'views/includes/users/header.php';
?>



    <div class="container mt-5">
        <h1 class="text-center">E-Consultation</h1>
        <p class="text-center">Please fill in the symptoms you are experiencing.</p>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="symptoms" class="form-label">Select your symptoms (choose 1-3):</label>
                <div>
                    <input type="checkbox" name="symptoms[]" value="toothache"> Toothache <br>
                    <input type="checkbox" name="symptoms[]" value="bleeding_gums"> Bleeding Gums <br>
                    <input type="checkbox" name="symptoms[]" value="bad_breath"> Bad Breath <br>
                    <input type="checkbox" name="symptoms[]" value="sensitive_teeth"> Sensitive Teeth <br>
                    <input type="checkbox" name="symptoms[]" value="swollen_gums"> Swollen Gums <br>
                    <input type="checkbox" name="symptoms[]" value="jaw_pain"> Jaw Pain <br>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">How long have you been experiencing these symptoms?</label>
                <select class="form-select" name="duration" required>
                    <option value="" disabled selected>Select Duration</option>
                    <option value="less_than_a_week">Less than a week</option>
                    <option value="1_week_to_1_month">1 week to 1 month</option>
                    <option value="more_than_1_month">More than 1 month</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Have you visited a dentist for this issue before?</label>
                <select class="form-select" name="previous_visit" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Prescription Modal -->
        <div class="modal fade" id="prescriptionModal" tabindex="-1" aria-labelledby="prescriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="prescriptionModalLabel">Prescription</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="prescriptionContent">
                        <!-- Prescription content will be injected here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<?php
include APP_DIR.'views/includes/users/footer.php';
?> 