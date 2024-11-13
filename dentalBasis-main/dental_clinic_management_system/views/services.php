<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Dental Clinic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>

<div class="container mt-5">
        <h1 class="text-center display-4">Our Dental Services</h1>
        <p class="text-center lead">We offer a comprehensive range of dental services to meet all your oral health needs.</p>
        
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            <!-- Dental Checkup -->
            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/Dental1.jpg" class="card-img-top" alt="Dental Checkup">
                    <div class="card-body">
                        <h5 class="card-title">Dental Checkup</h5>
                        <p class="card-text">Comprehensive dental checkups to ensure optimal oral health.</p>
                    </div>
                </div>
            </div>
            <!-- Teeth Cleaning -->
            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/cleaning.jpg" class="card-img-top" alt="Teeth Cleaning">
                    <div class="card-body">
                        <h5 class="card-title">Teeth Cleaning</h5>
                        <p class="card-text">Professional teeth cleaning to remove plaque and tartar buildup.</p>
                    </div>
                </div>
            </div>
            

            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/filling.jpg" class="card-img-top" alt="Filling">
                    <div class="card-body">
                        <h5 class="card-title">Filling</h5>
                        <p class="card-text">Restorative fillings to repair cavities and restore tooth function.</p>
                    </div>
                </div>
            </div>
            

            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/rootcanal.jpg" class="card-img-top" alt="Root Canal Treatment">
                    <div class="card-body">
                        <h5 class="card-title">Root Canal Treatment</h5>
                        <p class="card-text">Endodontic treatment to save and preserve your natural tooth.</p>
                    </div>
                </div>
            </div>
            

            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/dental2.jpg" class="card-img-top" alt="Teeth Whitening">
                    <div class="card-body">
                        <h5 class="card-title">Teeth Whitening</h5>
                        <p class="card-text">Effective whitening treatments for a brighter, whiter smile.</p>
                    </div>
                </div>
            </div>
            


            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/ortho.jpg" class="card-img-top" alt="Orthodontics">
                    <div class="card-body">
                        <h5 class="card-title">Orthodontics</h5>
                        <p class="card-text">Corrective orthodontic treatments to straighten teeth and improve bite.</p>
                    </div>
                </div>
            </div>
            

            <div class="col">
                <div class="card h-100 mb-4 shadow-sm">
                    <img src="../assets/images/extraction.jpg" class="card-img-top" alt="Extraction">
                    <div class="card-body">
                        <h5 class="card-title">Extraction</h5>
                        <p class="card-text">Safe and painless extractions for problematic or damaged teeth.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
            <a href="../views/appointment.php" class="book-now-btn">BOOK NOW</a>
        </div>
    </div>
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
        <iframe style="width: 100%; height: 250px;"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62101.006051552424!2d121.12697541555725!3d13.392942862231568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bceed599665a41%3A0x8d557af656b69759!2sTawiran%2C%20Calapan%2C%20Oriental%20Mindoro!5e0!3m2!1sen!2sph!4v1727625001471!5m2!1sen!2sph"
        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
