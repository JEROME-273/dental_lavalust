<?php
include APP_DIR.'views/includes/users/header.php';
?>
<style>
    .appointment-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
    }
    .appointment-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .appointment-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .appointment-header h1 {
        color: #333;
        font-size: 2rem;
        font-weight: 600;
    }
    .form-label {
        font-weight: 500;
        color: #555;
    }
    .form-control, .form-select {
        border-radius: 8px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .btn-book {
        background-color: #007bff;
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        border: none;
        font-weight: 500;
        transition: all 0.3s;
    }
    .btn-book:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
</style>

<div class="appointment-container">
    <div class="appointment-card">
        <div class="appointment-header">
            <h1><i class="bi bi-calendar-check me-2"></i>Book an Appointment</h1>
        </div>
        <form method="POST" action="<?=site_url('appointments');?>">
            <?php flash_alert(); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label"><i class="bi bi-person me-2"></i>First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label"><i class="bi bi-person me-2"></i>Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label"><i class="bi bi-envelope me-2"></i>Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label"><i class="bi bi-telephone me-2"></i>Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Address" class="form-label"><i class="bi bi-geo-alt me-2"></i>Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="appointment_date" class="form-label"><i class="bi bi-calendar-date me-2"></i>Appointment Date</label>
                    <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="service_id" class="form-label"><i class="bi bi-clipboard2-pulse me-2"></i>Select Service</label>
                    <select class="form-select" id="service_id" name="service_id" required>
                        <option value="" disabled selected>Select a service</option>
                        <?php if (!empty($services) && is_array($services)): ?>
                            <?php foreach ($services as $service): ?>
                                <option value="<?php echo htmlspecialchars($service['service_id']); ?>">
                                    <?php echo htmlspecialchars($service['service_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>No services available</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-book">
                    <i class="bi bi-calendar-check me-2"></i>Book Appointment
                </button>
            </div>
        </form>
    </div>
</div>

<div class="container">

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookedDates = <?= json_encode($bookedDates); ?>;
        const appointmentDateInput = document.getElementById('appointment_date');
        
        // Disable Sundays in the date picker
        const today = new Date();
        const nextSunday = new Date(today);
        nextSunday.setDate(today.getDate() + (7 - today.getDay())); // Get the next Sunday
        
        // Set the minimum date to today
        appointmentDateInput.setAttribute('min', today.toISOString().split('T')[0]);

        for (let i = 0; i < 7; i++) {
            const dateToCheck = new Date(today);
            dateToCheck.setDate(today.getDate() + i);
            if (dateToCheck.getDay() === 0) { // Check if it's Sunday
                appointmentDateInput.setAttribute('max', nextSunday.toISOString().split('T')[0]); // Allow selection till next Sunday
                break;
            }
        }

        appointmentDateInput.addEventListener('change', function () {
            const selectedDate = new Date(this.value).toISOString().split('T')[0];
            if (bookedDates.includes(selectedDate)) {
                alert('This date is fully booked. Please choose another date.');
                this.value = '';
            }

            const selectedTime = this.value.split('T')[1]; // Get time part from input
            const hours = selectedTime.split(':')[0]; // Get hour part

            if ((hours >= 8 && hours < 11) || (hours >= 13 && hours < 17)) {
                // Time is within allowed range
                return;
            } else {
                alert('Please select a time between 8 AM - 11 AM or 1 PM - 5 PM.');
 this.value = ''; // Clear the input
            }
        });
    });
</script>
</body>

<?php
    include APP_DIR.'views/includes/users/footer.php';
?> 

</html>