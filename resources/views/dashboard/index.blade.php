@extends('dashboard.dashboard_master')
@section('dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
           

            <!-- Main content -->
            {{-- <section class="content">
                <div class="row">
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-primary-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div class="title m-b-bd">
                                    <p class="text-mute mt-20 mb-0 font-size-16"></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-warning-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16"></p>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- /.content -->
        </div>
    </div>
    
    {{-- <script>
        var year = ['2013','2014','2015', '2016'];
        var data_click = '<?php echo $click; ?>';
        var data_viewer = '<?php echo $viewer; ?>';
    
    
        var barChartData = {
            labels: 'year',
            datasets: [{
                label: 'Click',
                backgroundColor: "rgba(220,220,220,0.5)",
                data: 'data_click'
            }, {
                label: 'View',
                backgroundColor: "rgba(151,187,205,0.5)",
                data: 'data_viewer'
            }]
        };
    
    
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, { type: 'bar',
                data: 'barChartData',
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(0, 255, 0)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly Website Visitor'
                    }
                }
            });
    
    
        };
    </script> --}}
    {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
    {{-- <script>
    var ctx = document.getElementById('myChart');
    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['hh', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: data_viewer,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script> --}}
@endsection
