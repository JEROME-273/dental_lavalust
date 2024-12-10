<?php
include APP_DIR.'views/includes/users/header.php';
?>
<body>
<h2>Book an Appointment</h2>
<form method="POST" action="<?=site_url('appointment');?>">
<?php flash_alert(); ?>
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="Address" class="form-label">Address</label>
        <input type="text" class="form-control" id="Address" name="Address" required>
    </div>
    <div class="mb-3">
        <label for="appointment_date" class="form-label">Appointment Date</label>
        <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
    </div>
    <div class="mb-3">
        <label for="service_id" class="form-label">Select Service</label>
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


    <button type="submit" class="btn btn-primary">Book Appointment</button>
</form>

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