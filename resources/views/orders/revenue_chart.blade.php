@extends('layouts.apps')

@section('contents')
    <div class="container">
        <h2>Tổng Doanh Thu Theo Tháng</h2>
        <canvas id="revenueChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var revenueChart = new Chart(ctx, {
        type: 'line', // Loại biểu đồ (biểu đồ đường)
        data: {
            labels: @json($months),
             // Dữ liệu tháng
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
                // Các tùy chọn cho plugins của biểu đồ (nếu cần)
            }
        }
    });
</script>


@endsection
