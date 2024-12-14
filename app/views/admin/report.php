<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Report - Dental Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .dashboard-container {
            padding: 2rem;
        }
        .page-header {
            margin-bottom: 2rem;
        }
        .page-title {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 600;
        }
        .card-custom {
            background: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        .stats-card {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
        }
        .stats-card .card-title {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
        }
        .stats-card .display-6 {
            font-weight: 600;
            margin: 1rem 0;
        }
        .stats-card .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.9rem;
        }
        .chart-container {
            position: relative;
            height: 300px;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .chart-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .report-section-title {
            color: #2c3e50;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9ecef;
        }
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }
            .chart-container {
                height: 300px;
            }
        }
        .stats-icon {
            font-size: 2rem;
            opacity: 0.8;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <?php include APP_DIR.'views/includes/admin/header.php'; ?>

    <div class="dashboard-container">
        <div class="page-header">
            <h1 class="page-title"><i class="bi bi-graph-up me-2"></i>Clinic Reports</h1>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-custom stats-card p-4">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-check stats-icon"></i>
                        <h4 class="card-title">Total Appointments</h4>
                        <p class="display-6"><?php echo htmlspecialchars($total_appointments); ?></p>
                        <p class="text-muted">Appointments recorded</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom stats-card p-4">
                    <div class="card-body text-center">
                        <i class="bi bi-people stats-icon"></i>
                        <h4 class="card-title">Total Users</h4>
                        <p class="display-6"><?php echo htmlspecialchars($total_users); ?></p>
                        <p class="text-muted">Registered users</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card card-custom chart-card">
                    <div class="card-body">
                        <h5 class="report-section-title">
                            <i class="bi bi-graph-up me-2"></i>Monthly Patient Statistics
                        </h5>
                        <div class="chart-container">
                            <canvas id="monthlyPatientsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom chart-card">
                    <div class="card-body">
                        <h5 class="report-section-title">
                            <i class="bi bi-pie-chart me-2"></i>Service Distribution
                        </h5>
                        <div class="chart-container">
                            <canvas id="serviceChart"></canvas>
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
