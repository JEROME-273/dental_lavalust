<?php
include APP_DIR.'views/includes/users/header.php';
?>

<style>
    body {
        background-color: #f9fbfc;
        font-family: 'Arial', sans-serif;
    }

    .feedback-form {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        transition: transform 0.3s ease-in-out;
    }

    .feedback-form:hover {
        transform: scale(1.02);
    }

    .feedback-form h2 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .star-rating {
        font-size: 28px;
        display: flex;
        gap: 5px;
        justify-content: center;
    }

    .star-rating .fa-star {
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s, transform 0.2s;
    }

    .star-rating .fa-star:hover,
    .star-rating .fa-star.fas {
        color: #ffc107;
        transform: scale(1.2);
    }

    .feedback-list {
        margin-top: 20px;
    }

    .feedback-item {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .feedback-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .feedback-item h5 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .feedback-item .rating {
        color: #ffc107;
    }

    .feedback-item .feedback-text {
        font-size: 14px;
        color: #555;
        margin-top: 10px;
    }

    .pagination .page-link {
        color: #007bff;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        border-radius: 5px;
        padding: 10px 15px;
        margin-bottom: 15px;
        text-align: center;
    }
</style>

<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="feedback-form p-4">
                    <h2 class="text-center mb-4">Dental Clinic Feedback</h2>
                    <?php if ($message): ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <div class="star-rating">
                                <i class="far fa-star" data-rating="1"></i>
                                <i class="far fa-star" data-rating="2"></i>
                                <i class="far fa-star" data-rating="3"></i>
                                <i class="far fa-star" data-rating="4"></i>
                                <i class="far fa-star" data-rating="5"></i>
                            </div>
                            <input type="hidden" name="rating" id="rating" required>
                        </div>
                        <div class="mb-3">
                            <label for="feedback" class="form-label">Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center mb-4">Recent Feedbacks</h2>
                <div class="feedback-list">
                    <?php foreach ($feedbacks as $feedback): ?>
                        <div class="feedback-item">
                            <div class="d-flex justify-content-between">
                                <h5><?php echo htmlspecialchars($feedback['name']); ?></h5>
                                <div class="rating">
                                    <?php for ($i = 0; $i < $feedback['rating']; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <p class="feedback-text"><?php echo nl2br(htmlspecialchars($feedback['feedback'])); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($totalPages > 1): ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating .fa-star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    ratingInput.value = rating;
                    updateStars(rating);
                });

                star.addEventListener('mouseover', function() {
                    const rating = this.getAttribute('data-rating');
                    updateStars(rating);
                });
            });

            document.querySelector('.star-rating').addEventListener('mouseout', function() {
                updateStars(ratingInput.value);
            });

            function updateStars(rating) {
                stars.forEach(star => {
                    if (star.getAttribute('data-rating') <= rating) {
                        star.classList.add('fas');
                        star.classList.remove('far');
                    } else {
                        star.classList.add('far');
                        star.classList.remove('fas');
                    }
                });
            }
        });
    </script>

<?php
include APP_DIR.'views/includes/users/footer.php';
?> 
