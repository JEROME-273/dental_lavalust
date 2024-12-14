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
    .time-slot-disabled {
        background-color: #e9ecef;
        cursor: not-allowed;
        opacity: 0.65;
    }
    .slots-available {
        margin-top: 10px;
        padding: 12px;
        border-radius: 8px;
        display: none;
        text-align: center;
        font-weight: 500;
    }
    .slots-available.warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
    .slots-available.danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .slots-available.success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
</style>

<div class="appointment-container">
    <div class="appointment-card">
        <div class="appointment-header">
            <h1><i class="bi bi-calendar-check me-2"></i>Book an Appointment</h1>
            <p class="text-muted">Please fill in the form below to schedule your appointment</p>
        </div>
        
        <form method="POST" action="<?=site_url('appointments');?>" id="appointmentForm">
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
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label"><i class="bi bi-telephone me-2"></i>Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-6 mb-3">
                    <label for="Address" class="form-label"><i class="bi bi-geo-alt me-2"></i>Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="service_id" class="form-label">
                        <i class="bi bi-clipboard2-pulse me-2"></i>Select Service
                    </label>
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
                <div class="col-md-6 mb-3">
                    <label for="appointment_date" class="form-label">
                        <i class="bi bi-calendar-date me-2"></i>Appointment Date
                    </label>
                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="appointment_time" class="form-label">
                        <i class="bi bi-clock me-2"></i>Appointment Time
                    </label>
                    <select class="form-select" id="appointment_time" name="appointment_time" required>
                        <option value="" disabled selected>Select time</option>
                        <option value="08:00">8:00 AM</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                    </select>
                </div>
                <div class="col-12">
                    <div id="slotsAvailable" class="slots-available"></div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-book" id="submitBtn">
                    <i class="bi bi-calendar-check me-2"></i>Book Appointment
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const appointmentForm = document.getElementById('appointmentForm');
    const appointmentDateInput = document.getElementById('appointment_date');
    const appointmentTimeSelect = document.getElementById('appointment_time');
    const slotsAvailableDiv = document.getElementById('slotsAvailable');
    const submitBtn = document.getElementById('submitBtn');
    const DAILY_LIMIT = 5;

    // Set minimum date to today
    const today = new Date();
    const formattedToday = today.toISOString().split('T')[0];
    appointmentDateInput.setAttribute('min', formattedToday);

    function checkAvailableSlots(date) {
        fetch(`<?= site_url('check-slots'); ?>?date=${date}`)
            .then(response => response.json())
            .then(data => {
                const slotsLeft = DAILY_LIMIT - data.count;
                submitBtn.disabled = slotsLeft <= 0;
                
                if (slotsLeft <= 0) {
                    Array.from(appointmentTimeSelect.options).forEach(option => {
                        if (option.value !== '') {
                            option.disabled = true;
                            option.classList.add('time-slot-disabled');
                        }
                    });
                    appointmentTimeSelect.value = '';
                    slotsAvailableDiv.className = 'slots-available danger';
                    slotsAvailableDiv.innerHTML = '<i class="bi bi-exclamation-triangle me-2"></i>No slots available for this date. Please choose another date.';
                } else {
                    Array.from(appointmentTimeSelect.options).forEach(option => {
                        if (option.value !== '') {
                            option.disabled = false;
                            option.classList.remove('time-slot-disabled');
                        }
                    });
                    
                    const statusClass = slotsLeft <= 2 ? 'warning' : 'success';
                    const icon = slotsLeft <= 2 ? 'bi-exclamation-circle' : 'bi-check-circle';
                    
                    slotsAvailableDiv.className = `slots-available ${statusClass}`;
                    slotsAvailableDiv.innerHTML = `<i class="bi ${icon} me-2"></i>${slotsLeft} slot${slotsLeft !== 1 ? 's' : ''} available for this date`;
                }
                slotsAvailableDiv.style.display = 'block';
            })
            .catch(error => {
                console.error('Error checking slots:', error);
                slotsAvailableDiv.className = 'slots-available danger';
                slotsAvailableDiv.innerHTML = '<i class="bi bi-exclamation-triangle me-2"></i>Error checking availability. Please try again.';
                slotsAvailableDiv.style.display = 'block';
            });
    }

    appointmentDateInput.addEventListener('input', function() {
        const selectedDate = new Date(this.value);
        appointmentTimeSelect.value = '';
        
        if (selectedDate.getDay() === 0) {
            alert('Sorry, we are closed on Sundays. Please select another day.');
            this.value = '';
            slotsAvailableDiv.style.display = 'none';
            return;
        }

        if (this.value < formattedToday) {
            alert('Please select a future date.');
            this.value = '';
            slotsAvailableDiv.style.display = 'none';
            return;
        }

        if (this.value) {
            checkAvailableSlots(this.value);
        } else {
            slotsAvailableDiv.style.display = 'none';
        }
    });

    appointmentForm.addEventListener('submit', function(e) {
        if (!appointmentDateInput.value || !appointmentTimeSelect.value) {
            e.preventDefault();
            alert('Please select both date and time for your appointment.');
        }
    });
});
</script>

<?php include APP_DIR.'views/includes/users/footer.php'; ?>