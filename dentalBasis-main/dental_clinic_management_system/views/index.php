<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dental Clinic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet"> <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-5">
        <!-- Carousel -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-image w-100" style="background-image: url('../assets/images/herowall.jpg');">
                        <h1 class="text-center">Welcome to Our Dental Clinic</h1>
                        <p class="text-center hero-paragraph">Your health and smile are our top priorities.</p>
                        <div class="text-center">
                            <a href="appointment.php" class="btn btn-primary btn-lg">Book an Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image w-100" style="background-image: url('../assets/images/OIP (8).jfif');">
                        <h1 class="text-center">Welcome to Our Dental Clinic</h1>
                        <p class="text-center hero-paragraph">Your health and smile are our top priorities.</p>
                        <div class="text-center">
                            <a href="appointment.php" class="btn btn-primary btn-lg">Book an Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image w-100" style="background-image: url('../assets/images/gayoso.jpg');">
                        <h1 class="text-center">Welcome to Our Dental Clinic</h1>
                        <p class="text-center hero-paragraph">Your health and smile are our top priorities.</p>
                        <div class="text-center">
                            <a href="appointment.php" class="btn btn-primary btn-lg">Book an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Our Services -->
        <h2 class="mt-5 text-center">Our Services</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="../assets/images/dental2.jpg" class="card-img-top" alt="Whitening service">
                    <div class="card-body">
                        <h5 class="card-title">Whitens</h5>
                        <p class="card-text">Professional cleaning to maintain your oral health.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="../assets/images/dental3.jpg" class="card-img-top" alt="Filling service">
                    <div class="card-body">
                        <h5 class="card-title">Saving</h5>
                        <p class="card-text">Restore your teeth with high-quality filling materials.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="../assets/images/Dental1.jpg" class="card-img-top" alt="Whitening treatment">
                    <div class="card-body">
                        <h5 class="card-title">Equipped</h5>
                        <p class="card-text">Get a brighter smile with our whitening treatments.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <h2 class="mt-5 text-center">What Our Patients Say</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 text-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"The staff are incredibly friendly and professional! I always feel at ease during my visits."</p>
                        <h5 class="card-title">- Sarah T.</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"I had a great experience! The treatments were quick and painless."</p>
                        <h5 class="card-title">- John D.</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"Highly recommend this clinic! They really care about their patients."</p>
                        <h5 class="card-title">- Emily R.</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us Section -->
        <div class="text-center mt-5">
            <h2>Contact Us</h2>
            <div class="row">
                <div class="col-lg-6">
                    <form action="submit_message.php" method="POST" class="mt-4">
                        <h1>Send a Message</h1>
                        <div class="mb-3">
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="concern_type" class="form-label">Concern Type</label>
                            <select name="concern_type" class="form-select" id="concern_type" required>
                                <option value="" disabled selected>Select Concern Type</option>
                                <option value="reschedule">Reschedule</option>
                                <option value="cancel">Cancel</option>
                                <option value="inquiry">Inquiry</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="concerns" class="form-control" rows="4" placeholder="Your Concerns" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <div class="col-lg-6 custom-map-div">
                    <div class="bg-light p-30 mb-30">
                        <iframe style="width: 100%; height: 250px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62101.006051552424!2d121.12697541555725!3d13.392942862231568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bceed599665a41%3A0x8d557af656b69759!2sTawiran%2C%20Calapan%2C%20Oriental%20Mindoro!5e0!3m2!1sen!2sph!4v1727625001471!5m2!1sen!2sph" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="bg-light p-30 mb-3">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Tawiran, Calapan City</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>dentalclinic@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
