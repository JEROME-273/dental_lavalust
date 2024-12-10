<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Report - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <link href="../assets/css/style.css" rel="stylesheet"> -->
    <style>
        .card-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }
        .chart-container {
            position: relative;
            height: 400px;
        }
        .report-section-title {
            font-size: 1.5rem;
            font-weight: 500;
            color: #333;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    

    <div class="container mt-5">
        <div class="mb-4">
            <h3 class="text-center">Clinic Reports</h3>
            <p class="text-center text-muted">Overview of clinic activities and patient statistics</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom p-3">
                    <div class="card-body text-center">
                        <h4 class="card-title">Total Patients</h4>
                        <p class="display-6"><?php echo htmlspecialchars($total_patients); ?></p>
                        <p class="text-muted">Total number of registered patients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-custom p-3">
                    <div class="card-body">
                        <h5 class="report-section-title">Number of Patients Per Month</h5>
                        <div class="chart-container">
                            <canvas id="monthlyPatientsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-12">
                <div class="card card-custom p-3">
                    <div class="card-body">
                        <h5 class="report-section-title">Services Chosen by Patients</h5>
                        <div class="chart-container">
                            <canvas id="serviceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data for the Monthly Patients Chart
        const monthlyPatientsData = {
            labels: [
                <?php
                foreach ($monthly_patient_data as $data) {
                    echo '"' . date("F", mktime(0, 0, 0, $data['month'], 1)) . '", ';
                }
                ?>
            ],
            datasets: [{
                label: 'Number of Patients',
                data: [
                    <?php
                    foreach ($monthly_patient_data as $data) {
                        echo $data['total_patients'] . ', ';
                    }
                    ?>
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        };

        // Data for the Service Popularity Chart
        const serviceData = {
            labels: [
                <?php
                foreach ($service_patient_data as $data) {
                    echo '"' . $data['service_name'] . '", ';
                }
                ?>
            ],
            datasets: [{
                label: 'Number of Patients',
                data: [
                    <?php
                    foreach ($service_patient_data as $data) {
                        echo $data['total_patients'] . ', ';
                    }
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        };

        // Configuration for the Monthly Patients Chart
        const configMonthlyPatients = {
            type: 'bar',
            data: monthlyPatientsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Patients'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                }
            }
        };

        // Configuration for the Service Popularity Chart
        const configService = {
            type: 'doughnut',
            data: serviceData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.raw;
                            }
                        }
                    }
                }
            }
        };

        // Render the Monthly Patients Chart
        const monthlyPatientsChart = new Chart(
            document.getElementById('monthlyPatientsChart'),
            configMonthlyPatients
        );

        // Render the Service Popularity Chart
        const serviceChart = new Chart(
            document.getElementById('serviceChart'),
            configService
        );
    </script>
</body>
</html>
