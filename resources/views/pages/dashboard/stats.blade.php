@extends('pages.dashboard.layout')

@section('content')
<div class="px-10 py-5">
<h1 class="text-2xl text-slate-200 mb-5 ">Statistics</h1>
    <div class="w-full h-full  grid grid-cols-3 gap-5 mb-5">
        <div class="h-20 bg-slate-600 rounded shadow-md text-slate-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$usersNumber}} <span class="text-slate-400 font-light italic">Clients</span></div>
            <i class="fa-solid fa-people-group text-3xl text-slate-300"></i>
        </div>
        <div class="h-20 bg-slate-600 rounded shadow-md text-slate-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$vehiclesNumber}} <span class="text-slate-400 font-light italic">Vehicles</span></div>
            <i class="fa-solid fa-car text-3xl text-slate-300"></i>
        </div>
        <div class="h-20 bg-slate-600 rounded shadow-md text-slate-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$mechanicsNumber}} <span class="text-slate-400 font-light italic">Mechanics</span></div>
            <i class="fa-solid fa-users-gear text-3xl text-slate-300"></i>
        </div>
    </div>
    <div class="max-w-2xl ">
        <canvas id="myPieChart" ></canvas>
    </div>

</div>

<script>document.addEventListener('DOMContentLoaded', function () {
    // Data from PHP
    const chartData = <?php echo json_encode($chart); ?>;

    // Get the context of the canvas element we want to select
    const ctx = document.getElementById('myPieChart').getContext('2d');

    // Create the pie chart
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Clients', 'Mechanics', 'Vehicles'],
            datasets: [{
                data: [chartData.clients, chartData.mechanics, chartData.vehicles],
                backgroundColor: ['#94a3b8', '#475569', '#1e293b'],
                hoverBackgroundColor: ['#94a3b8', '#475569', '#1e293b']
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
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed;
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});</script>
@endsection
