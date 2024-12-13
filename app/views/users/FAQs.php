<?php include APP_DIR.'views/includes/users/header.php'; ?>

<style>
    .faq-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
    }
    .faq-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .faq-header h1 {
        color: #2c3e50;
        font-size: 2.5rem;
        font-weight: 600;
    }
    .accordion-item {
        border: none;
        background: #fff;
        border-radius: 10px !important;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .accordion-button {
        padding: 20px;
        font-weight: 500;
        color: #2c3e50;
        background: #fff;
        border-radius: 10px !important;
        border: none;
    }
    .accordion-button:not(.collapsed) {
        color: #fff;
        background-color: #0d6efd;
        box-shadow: none;
    }
    .accordion-button:focus {
        box-shadow: none;
        border: none;
    }
    .accordion-button::after {
        background-size: 1.2rem;
        transition: all 0.3s ease;
    }
    .accordion-body {
        padding: 20px;
        background: #fff;
        color: #666;
        line-height: 1.6;
        font-size: 1.1rem;
    }
    .accordion-button:hover {
        background-color: #f8f9fa;
    }
    .accordion-button:not(.collapsed):hover {
        background-color: #0b5ed7;
    }
    @media (max-width: 768px) {
        .faq-container {
            padding: 15px;
        }
        .faq-header h1 {
            font-size: 2rem;
        }
        .accordion-button {
            padding: 15px;
        }
    }
</style>

<div class="faq-container">
    <div class="faq-header">
        <h1><i class="bi bi-question-circle me-2"></i>Frequently Asked Questions</h1>
    </div>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    <i class="bi bi-chat-right-text me-2"></i>What should I expect during my first visit?
                </button>
            </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        During your first visit, we will conduct a comprehensive examination of your dental health. This may include X-rays, a discussion of your medical history, and a consultation about your oral health goals.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    <i class="bi bi-calendar-check me-2"></i>How often should I visit the dentist?
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        It is recommended to visit the dentist at least twice a year for routine check-ups and cleanings. However, the frequency may vary based on your individual dental needs.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    <i class="bi bi-shield-check me-2"></i>What safety measures do you have in place?
                </button>
            </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We offer a wide range of dental services including general dentistry, cosmetic dentistry, orthodontics, pediatric dentistry, and emergency dental care.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                    <i class="bi bi-cash-coin me-2"></i>Do you accept insurance?
                </button>
            </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        If you experience a dental emergency, such as a toothache, broken tooth, or injury to the mouth, contact our office immediately for guidance on the next steps and to schedule an emergency appointment.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                    <i class="bi bi-clock-history me-2"></i>What are your office hours?
                </button>
            </h2>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, we accept a variety of dental insurance plans. Please contact our office for specific information about your plan and any payment options available.
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include APP_DIR.'views/includes/users/footer.php';
?> 
