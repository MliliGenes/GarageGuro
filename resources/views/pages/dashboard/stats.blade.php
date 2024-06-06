@extends('pages.dashboard.layout')

@section('content')
<div class="px-10 py-5">
<h1 class="text-2xl text-gray-200 mb-5 ">Statistics</h1>
    <div class="w-full h-full  grid grid-cols-3 gap-5 mb-5">
        <div class="h-20 bg-gray-600 rounded shadow-md text-gray-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$usersNumber}} <span class="text-gray-400 font-light italic">{{ __("sidebar.clients") }}</span></div>
            <i class="fa-solid fa-people-group text-3xl text-gray-300"></i>
        </div>
        <div class="h-20 bg-gray-600 rounded shadow-md text-gray-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$vehiclesNumber}} <span class="text-gray-400 font-light italic">{{ __("sidebar.vehicles") }}</span></div>
            <i class="fa-solid fa-car text-3xl text-gray-300"></i>
        </div>
        <div class="h-20 bg-gray-600 rounded shadow-md text-gray-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$mechanicsNumber}} <span class="text-gray-400 font-light italic">{{ __("sidebar.mechanicians") }}</span></div>
            <i class="fa-solid fa-users-gear text-3xl text-gray-300"></i>
        </div>
        <div class="h-20 bg-gray-600 rounded shadow-md text-gray-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$partsNumber}} <span class="text-gray-400 font-light italic">{{ __("sidebar.parts") }}</span></div>
            <i class="fa-solid fa-car text-3xl text-gray-300"></i>
        </div>
        <div class="h-20 bg-gray-600 rounded shadow-md text-gray-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$reparationsNumber}} <span class="text-gray-400 font-light italic">{{ __("sidebar.repairs") }}</span></div>
            <i class="fa-solid fa-wrench  text-3xl text-gray-300"></i>
        </div>
        <div class="h-20 bg-gray-600 rounded shadow-md text-gray-200 text-center flex items-center justify-between px-6 text-lg">
            <div>{{$invoicesNumber}} <span class="text-gray-400 font-light italic">{{ __("sidebar.invoices") }}</span></div>
            <i class="fa-solid fa-file-invoice text-3xl text-gray-300"></i>
        </div>
    </div>
    <div class="w-full h-full flex gap-5 mb-5">
        <div class="  flex-initial w-[25vw] ">
            <canvas class="myPieChart1" ></canvas>
        </div>
        <div class=" flex-1">
            <canvas class="myPieChart2 " ></canvas>
        </div>
    </div>


</div>

<script>document.addEventListener('DOMContentLoaded', function () {
    // Data from PHP
    const chartData = <?php echo json_encode($chart); ?>;

    // Get the context of the canvas element we want to select
    const ctx = document.querySelector('.myPieChart1').getContext('2d');
    const ctx2 = document.querySelector('.myPieChart2').getContext('2d');

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

    // Create the pie chart
    const myPieChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Spare Parts', 'Repairs', 'Invoices'],
            datasets: [{
                data: [chartData.parts, chartData.reparations, chartData.invoices],
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
