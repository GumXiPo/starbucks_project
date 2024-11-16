
@extends('layouts.apps')

@section('contents')<!DOCTYPE html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng Doanh Thu Theo Tháng</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h2>Tổng Doanh Thu Theo Tháng</h2>
        <canvas id="revenueChart" width="400" height="200"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line', // Loại biểu đồ (biểu đồ đường)
            data: {
                labels: @json($months), // Dữ liệu tháng
                datasets: [{
                    label: 'Tổng Doanh Thu',
                    data: @json($totals), // Dữ liệu tổng doanh thu
                    borderColor: 'rgb(75, 192, 192)',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Doanh thu: ' + tooltipItem.raw + ' VND';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tháng'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Doanh Thu (VND)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

@endsection