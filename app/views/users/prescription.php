<?php
include APP_DIR.'views/includes/users/header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Your Prescription</h1>

    <?php if (isset($prescription) && !empty($prescription)): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Based on your symptoms:</h5>
                <?php echo $prescription; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center">No prescription available. Please complete the e-consultation form.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="<?php echo site_url('econsultation'); ?>" class="btn btn-primary">Back to E-Consultation</a>
    </div>
</div>

<?php
include APP_DIR.'views/includes/users/footer.php';
?>

