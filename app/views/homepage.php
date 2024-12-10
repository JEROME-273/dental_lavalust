<?php
include APP_DIR.'views/includes/users/header.php';
// include APP_DIR.'views/templates/header.php';
?>
<body>
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background-image: url('../assets/images/teeth.jpg'); background-size: cover; background-position: center;">
<div class="container py-5">
    <div class="row justify-content-start">
        <div class="col-lg-8 text-center text-lg-start">
            <h3 class="d-inline-block text-uppercase">Welcome To Gayoso</h3>
            <h1 class="display-1 text-white mb-md-4">Where Bright Smiles Begin! <br> Your Smile, Our Priority!</h1>
            <div class="pt-2">
                <a href="<?=site_url('appointment');?>"class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Appointment</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="../assets/images/cleaning.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                <h2 class="text-left my-4">About Us</h2>
                    <h1 class="display-4">Exceptional Dental Care for a Healthier, Happier Smile.</h1>
                </div>
                <p>At Gayoso Dental Clinic, we are committed to delivering exceptional dental care to you and your family. With a focus on personalized treatments and the latest dental technologies, we ensure a comfortable and stress-free experience for patients of all ages. From preventive care to advanced restorative and cosmetic procedures, our dedicated team of professionals strives to improve oral health and create confident smiles. At Gayoso Dental Clinic, your well-being is our priority, and we are here to provide the best possible care in a warm and welcoming environment.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Our Services -->
<h2 class="text-center my-4">Our Services</h2>
<div class="services-row">
<div class="service-card">
    <img src="../assets/images/dental2.jpg" alt="Whitening">
    <div class="card-body">
        <h5 class="card-title">Whitens</h5>
        <p class="card-text">Professional cleaning to maintain your oral health.</p>
    </div>
</div>
<div class="service-card">
    <img src="../assets/images/dental3.jpg" alt="Filling">
    <div class="card-body">
        <h5 class="card-title">Saving</h5>
        <p class="card-text">Restore your teeth with high-quality filling materials.</p>
    </div>
</div>
<div class="service-card">
    <img src="../assets/images/Dental1.jpg" alt="Whitening Treatment">
    <div class="card-body">
        <h5 class="card-title">Equipped</h5>
        <p class="card-text">Get a brighter smile with our whitening treatments.</p>
    </div>
</div>
</div>
<div class="see-more-btn">
<a href="<?=site_url('services');?>" class="custom-btn">See More</a>
</div>

<!-- Send Message Start -->
<div id="message-container" class="container-fluid my-5 py-5">

<div class="container py-5">
    <div class="row gx-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="mb-4">
                <h1 class="display-4 text-white">Send Us A Message</h1>
            </div>
            <p class="text-white mb-5">If you have any questions or concerns, please feel free to reach out to us. We're here to help!</p>
            <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a>
        </div>
        <div class="col-lg-6">
            <div class="bg-white text-center rounded p-5">
            <?php flash_alert(); ?>
                <form action="<?=site_url('message');?>" method="POST" class="mt-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" name="full_name" class="form-control bg-light border-0" placeholder="Full Name" required>
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email Address" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="contact_number" class="form-control bg-light border-0" placeholder="Contact Number" required>
                        </div>
                        <div class="col-12">
                            <textarea name="concerns" class="form-control bg-light border-0" rows="4" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-3">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Send Message End -->

<!-- Feedback Start -->
<div class="container-fluid py-5">
<div class="container">
    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
        <h2 class="text-center my-4">Feedback</h2>
        <h1 class="display-4">Patients Say About Our Services</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item text-center">
                    <p class="fs-4 fw-normal">"The team at Gayoso Dental Clinic truly transformed my dental experience. From the moment I walked in, I felt welcomed and at ease. The staff is incredibly professional and attentive, and the treatments are top-notch. I’ve never felt more confident about my smile!"</p>
                    <hr class="w-25 mx-auto">
                    <h3>James Andrie</h3>
                    <h6 class="fw-normal text-primary mb-3">Marketing Professional</h6>
                </div>
                <div class="testimonial-item text-center">
                    <p class="fs-4 fw-normal">"I’ve been to several dental clinics, but none compare to the level of care I received at Gayoso Dental Clinic. The dentists are knowledgeable, friendly, and make sure to explain everything in detail. I’m extremely satisfied with the results of my treatments!"</p>
                    <hr class="w-25 mx-auto">
                    <h3>Mark Joseph</h3>
                    <h6 class="fw-normal text-primary mb-3">Software Engineer</h6>
                </div>
                <div class="testimonial-item text-center">
                    <p class="fs-4 fw-normal">"I had an amazing experience at Gayoso Dental Clinic. The staff is incredibly professional, and they made sure I was comfortable throughout my visit. My dental health has never been in better shape thanks to their expert care. Highly recommended!"</p>
                    <hr class="w-25 mx-auto">
                    <h3>Vyre</h3>
                    <h6 class="fw-normal text-primary mb-3">Content Writer</h6>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Feedback End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
<div class="container">
    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
        <h2 class="text-center my-4">Contact</h2>
        <h1 class="display-5">Visit Us for Personal Assistance</h1>
    </div>
    <div class="row">
            <div class="col-12" style="height: 500px;">
                <div class="position-relative h-100">
                    <iframe class="position-relative w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3881.087252632285!2d121.17059027834136!3d13.406924053301157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bce8cbc99a3fcd%3A0xd884c4ab0bbff360!2sGozar%2C%20Calapan%2C%20Oriental%20Mindoro!5e0!3m2!1sen!2sph!4v1732381293263!5m2!1sen!2sph" 
                        frameborder="0" style="border:2px;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    <div class="row g-5 mb-5">
        <div class="col-lg-4">
            <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 80px; height: 50px;"> <!-- Reduced size -->
                    <i class="fa fa-lg fa-map-marker-alt text-white"></i> <!-- Reduced icon size -->
                </div>
                <h6 class="mb-0">Tawiran, Calapan City</h6>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 80px; height: 50px;"> <!-- Reduced size -->
                    <i class="fa fa-lg fa-envelope text-white"></i> <!-- Reduced icon size -->
                </div>
                <h6 class="mb-0">dentalclinic@gmail.com</h6>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 80px; height: 50px;"> <!-- Reduced size -->
                    <i class="fa fa-lg fa-phone-alt text-white"></i> <!-- Reduced icon size -->
                </div>
                <h6 class="mb-0">+012 345 67890</h6>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Contact End -->

            <script>
$(document).ready(function() {
$(".testimonial-carousel").owlCarousel({
    items: 1, // Display one item at a time
    loop: true, // Enable infinite loop
    autoplay: true, // Enable autoplay
    autoplayTimeout: 5000, // 5 seconds delay
    autoplayHoverPause: true, // Pause on hover
    nav: true, // Enable navigation
    navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'], // Add icons to navigation buttons
});
});
</script>
</body>
<?php
include APP_DIR.'views/includes/users/footer.php';
?> 

</html>