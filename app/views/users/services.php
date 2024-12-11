<?php
include APP_DIR.'views/includes/users/header.php';
?>
<style>
    /* General Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

/* Page Title */
h1.text-center {
    font-size: 2.5rem;
    color: #007bff;
    margin-top: 20px;
}

h2 {
    font-size: 3rem; /* Larger title */
    color: #0056b3; /* Dental blue theme */
    margin-bottom: 40px;
}

p.text-center {
    color: #6c757d;
    margin-bottom: 30px;
}

/* Services Container */
.services-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto 50px auto;
    padding: 0 15px;
}

/* Individual Service Cards */
.service-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.service-card .card-body {
    padding: 15px;
}

.service-card .card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 10px;
}

.service-card .card-text {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.4;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

/* Book Now Button */
.book-now-btn {
    display: inline-block;
    padding: 12px 25px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.book-now-btn:hover {
    background-color: #0056b3;
}

/* Contact Section */
.container .text-center {
    margin-bottom: 30px;
}

.row .bg-light {
    border: 1px solid #ddd;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.row .bg-light:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.row .fa {
    font-size: 2rem;
}

.row h6 {
    font-size: 1rem;
    color: #6c757d;
}

/* Google Map Styling */
iframe {
    border-radius: 10px;
    border: 1px solid #ddd;
}
</style>

<body>

<h2 class="text-center">Our Dental Services</h2>
<p class="text-center">We offer a comprehensive range of dental services to meet all your oral health needs.</p>

<div class="services-container">
    <!-- Dental Checkup -->
    <div class="service-card">
        <img src="https://i.ibb.co/8rSmb33/Dental1.jpg" alt="Dental Checkup">
        <div class="card-body">
            <h5 class="card-title">Dental Checkup</h5>
            <p class="card-text">Comprehensive dental checkups to ensure optimal oral health.</p>
        </div>
    </div>

    <!-- Teeth Cleaning -->
    <div class="service-card">
        <img src="https://i.ibb.co/xYRhRwh/cleaning.webp" alt="Teeth Cleaning">
        <div class="card-body">
            <h5 class="card-title">Teeth Cleaning</h5>
            <p class="card-text">Professional teeth cleaning to remove plaque and tartar buildup.</p>
        </div>
    </div>

    <!-- Filling -->
    <div class="service-card">
        <img src="https://i.ibb.co/XCRqgJQ/filling.jpg" alt="Filling">
        <div class="card-body">
            <h5 class="card-title">Filling</h5>
            <p class="card-text">Restorative fillings to repair cavities and restore tooth function.</p>
        </div>
    </div>

    <!-- Root Canal Treatment -->
    <div class="service-card">
        <img src="https://i.ibb.co/7gPnkN3/rootcanal.jpg" alt="Root Canal Treatment">
        <div class="card-body">
            <h5 class="card-title">Root Canal Treatment</h5>
            <p class="card-text">Endodontic treatment to save and preserve your natural tooth.</p>
        </div>
    </div>

    <!-- Teeth Whitening -->
    <div class="service-card">
        <img src="https://i.ibb.co/QbGCLTb/dental2.jpg" alt="Teeth Whitening">
        <div class="card-body">
            <h5 class="card-title">Teeth Whitening</h5>
            <p class="card-text">Effective whitening treatments for a brighter, whiter smile.</p>
        </div>
    </div>

    <!-- Orthodontics -->
    <div class="service-card">
        <img src="https://i.ibb.co/TKp1bZM/ortho.webp" alt="Orthodontics">
        <div class="card-body">
            <h5 class="card-title">Orthodontics</h5>
            <p class="card-text">Corrective orthodontic treatments to straighten teeth and improve bite.</p>
        </div>
    </div>

    <!-- Extraction -->
    <div class="service-card">
        <img src="https://i.ibb.co/7z4593m/extraction.jpg" alt="Extraction">
        <div class="card-body">
            <h5 class="card-title">Extraction</h5>
            <p class="card-text">Safe and painless extractions for problematic or damaged teeth.</p>
        </div>
    </div>

    <!-- Bracing -->
    <div class="service-card">
        <img src="https://i.ibb.co/7X1H7ts/braces.jpg" alt="Bracing">
        <div class="card-body">
            <h5 class="card-title">Bracing</h5>
            <p class="card-text">Align your teeth and improve your smile with quality bracing solutions.</p>
        </div>
    </div>

    <!-- Gum Treatment -->
    <div class="service-card">
        <img src="https://i.ibb.co/qR1BSyY/Deep-Gum.jpg" alt="Gum Treatment">
        <div class="card-body">
            <h5 class="card-title">Gum Treatment</h5>
            <p class="card-text">Effective treatments to maintain healthy gums and prevent periodontal disease.</p>
        </div>
    </div>
</div>

<div class="text-center">
    <a href="<?=site_url('appointment');?>" class="book-now-btn">BOOK NOW</a>
</div>

<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
        <h2 class="text-center">Contact</h2>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<?php
include APP_DIR.'views/includes/users/footer.php';
?> 

