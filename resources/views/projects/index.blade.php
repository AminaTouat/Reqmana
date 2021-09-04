@extends('projects.current_project')
@section('projects')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class=" col-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="myChart" height="280" width="600"></canvas>
                            </div>
                          
                        </div>
                    </div>
                    <div class=" col-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="importance" height="280" width="600"></canvas>
                            </div>
                          
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class=" col-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="myChart2" height="280" width="600"></canvas>
                            </div>
                          
                        </div>
                    </div>
                    <div class=" col-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="Simportance" height="280" width="600"></canvas>
                            </div>
                          
                        </div>
                    </div>
                </div>
                
            </section>
            <!-- /.content -->
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart');
        
        var data_draft = <?php echo $draft; ?>;
        var data_implemented = <?php echo $implemented; ?>;
        var data_approved = <?php echo $approved; ?>;
        
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Draft', 'implemented','Approved'],
                datasets: [{
                    label: '# of Votes',
                    data: [data_draft,data_implemented,data_approved],
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
                    borderWidth: 1
                    
                }
               
            ]
            },
            options: {
            
                plugins: {
            title: {
                display: true,
                text: 'User Requirement Status'
            }

        }
        
            }
        });
        var ctx = document.getElementById('myChart2');
        var data_Sdraft = <?php echo $Sdraft; ?>;
        var data_Simplemented = <?php echo $Simplemented; ?>;
        var data_Sapproved = <?php echo $Sapproved; ?>;
        var myChart2 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Draft', 'implemented','Approved'],
                datasets: [{
                    label: '# of Votes',
                    data: [data_Sdraft,data_Simplemented,data_Sapproved],
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
                    borderWidth: 1
                    
                }
               
            ]
            },
            options: {
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
                plugins: {
            title: {
                display: true,
                text: 'Software Requirement Status'
            }
        }
            }
        });
        var ctx = document.getElementById('importance');
        var data_may = <?php echo $may; ?>;
        var data_should = <?php echo $should; ?>;
        var data_must = <?php echo $must; ?>;
        var myChart2 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['must', 'should','may'],
                datasets: [{
                    label: '# of Votes',
                    data: [data_must,data_should,data_may],
                    backgroundColor: [
                        "#4b77a9",
                        "#bf7cbf",
                     "#d21243",
                     "#B27200"
                    ],
                    borderColor: [
                        "#fff"
                    ],
                    borderWidth: 1
                    
                }
               
            ]
            },
            options: {
                
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
                plugins: {
            title: {
                display: true,
                text: 'User Requirement Importance'
            }
        }
            }
       
        });
        var ctx = document.getElementById('Simportance');
        var data_Smay = <?php echo $Smay; ?>;
        var data_Sshould = <?php echo $Sshould; ?>;
        var data_Smust = <?php echo $Smust; ?>;
        var myChart2 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['must', 'should','may'],
                datasets: [{
                    label: '# of Votes',
                    data: [data_Smust,data_Sshould,data_Smay],
                    backgroundColor: [
                        "#4b77a9",
                        "#bf7cbf",
                     "#d21243",
                     "#B27200"
                    ],
                    borderColor: [
                      "#fff"
                    ],
                    borderWidth: 1
                    
                }
               
            ]
            },
            options: {
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
                plugins: {
            title: {
                display: true,
                text: 'Software Requirement Importance'
            }
        }
            }
        });
        </script>

@endsection
