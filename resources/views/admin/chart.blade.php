@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a>/ <span style="color:red"> Chart </span>
</div>
<div id="recap-chart">
    <h4> Monthly Recap Chart </h4>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <center> 
                    <h4> Complete vs In Progress </h4>
                    <h6> {{ $year }}</h6>
                </center>
                <div style="float:right;margin-top:-50px;"> 
                    <form action="{{ Route('filterChart') }}" method="GET">
                        <select style="border-radius:5px;border:none;" name="year" class="input-select-categories" onchange='if(this.value != 0) {this.form.submit();} '>
                            <option value="0">Filter Year</option>
                            <option value="All Year">All Year</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                        </select>
                    </form>
                </div>
                <br>
                <div id="grafik" style="margin-left:-60px;"></div>
            </div>
            <div class="col-md-4">
                <center> 
                    <b> Goal Completion Ticket </b>
                </center><br>
                <div id="progress-request">
                </div>
                <div id="progress-incident">
                </div>
            </div>
        </div>
    </div>
            <hr style="margin-top:0px;">
    <div class="container">
        <div class="row" style="text-align: center">
            <div class="col-md-3" style="border-right:1px solid silver">
                <span style="font-weight: bold">
                    {{ $tiket->where('Request_Type', 'Request')->count() }}
                </span><br>
                This Month Request
            </div>
            <div class="col-md-3" style="border-right:1px solid silver">
                <span style="font-weight: bold">
                    {{ $tiket->where('Request_Type', 'Incident')->count() }}
                </span><br>
                This Month Incident
            </div>
            <div class="col-md-3" style="border-right:1px solid silver">
                <span style="font-weight: bold" >
                    {{ $tiket->where('Request_Type', 'Change')->count() }}
                </span><br>
                This Month Change
            </div>
            <div class="col-md-3">
                <span style="font-weight: bold">
                    {{ $tiket->where('Request_Type', 'Problem')->count() }}
                </span><br>
                This Month Problem
            </div>
        </div>
    </div>
</div>

<div class="container"> 
        <div class="row" style="margin-left:20px;">
            <div class="col-md-6">
                <div class="db-card-detail" style="border-top: 10px solid green;height:430px;">
                    <div id="piechart-tiket-teknisi" style="margin-top:-15px;"> </div>    
                </div>
            </div>
            <div class="col-md-2" style="margin-left:75px;">
                <div class="db-card-detail" style="border-top:10px solid #FFC107;height:430px;">
                    <div id="piechart-task-teknisi" style="margin-top:-15px;"> </div>    
                </div>
            </div>
        </div>
        <div class="row" style="margin-left:20px;margin-bottom:35px;">
            <div class="col-md-6">
                <div class="db-card-detail" style="border-top:10px solid green; height:430px;">
                    <figure class="highcharts-figure">
                        <div id="bar-chart-ticket-inprogress" style="margin-top:-15px;"></div>
                    </figure>
                </div>
            </div>
            <div class="col-md-2" style="margin-left:75px;">
                <div class="db-card-detail" style="border-top:10px solid #FFC107; height:430px;">
                    <figure class="highcharts-figure">
                        <div id="bar-chart-ticket-complete" style="margin-top:-15px;"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div> 

{{-- barplot tiket complete --}}
<script>
    var tiket_complete_request = <?php echo json_encode($tiket_complete_request) ?>;
    var tiket_complete_incident = <?php echo json_encode($tiket_complete_incident) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.setOptions({
            chart: {
                style: {
                    fontFamily: 'Montserrat'
                }
            }
        });

    var chart = Highcharts.chart('bar-chart-ticket-complete', {

    chart: {
        type: 'column',
    },

    title: {
        text: '<b> Monitoring Ticket Complete<b>',
        align: 'left'
    },

    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'vertical'
    },

    xAxis: {
        categories: bulan,
        labels: {
            x: -10
        }
    },

    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Amount'
        }
    },

    series: [{
        name: 'Request',
        data: tiket_complete_request
    }, {
        name: 'Incident',
        data: tiket_complete_incident,
        color: 'green'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                },
                yAxis: {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -5
                    },
                    title: {
                        text: null
                    }
                },
                subtitle: {
                    text: null
                },
                credits: {
                    enabled: false
                }
            }
        }]
    }
    });

    document.getElementById('small').addEventListener('click', function () {
    chart.setSize(400);
    });

    document.getElementById('large').addEventListener('click', function () {
    chart.setSize(600);
    });

    document.getElementById('auto').addEventListener('click', function () {
    chart.setSize(null);
    });
</script>

// bar chart tiket on progress
<script>
    var tiket_in_progress_request = <?php echo json_encode($tiket_in_progress_request) ?>;
    var tiket_in_progress_incident = <?php echo json_encode($tiket_in_progress_incident) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.setOptions({
            chart: {
                style: {
                    fontFamily: 'Montserrat'
                }
            }
        });

    var chart = Highcharts.chart('bar-chart-ticket-inprogress', {

    chart: {
        type: 'column',
    },

    title: {
        text: '<b> Monitoring Ticket in Progress<b>',
        align: 'left'
    },

    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'vertical'
    },

    xAxis: {
        categories: bulan,
        labels: {
            x: -10
        }
    },

    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Amount'
        }
    },

    series: [{
        name: 'Request',
        data: tiket_in_progress_request
    }, {
        name: 'Incident',
        data: tiket_in_progress_incident,
        color: 'green'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                },
                yAxis: {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -5
                    },
                    title: {
                        text: null
                    }
                },
                subtitle: {
                    text: null
                },
                credits: {
                    enabled: false
                }
            }
        }]
    }
    });

    document.getElementById('small').addEventListener('click', function () {
    chart.setSize(400);
    });

    document.getElementById('large').addEventListener('click', function () {
    chart.setSize(600);
    });

    document.getElementById('auto').addEventListener('click', function () {
    chart.setSize(null);
    });
</script>


//{{-- Progress Bar Request --}}
<script>
    var total_request = <?php echo json_encode($tiket->where('Request_Type', 'Request')->count()) ?>;
    var request_completed = <?php echo json_encode($tiket->whereIn('Request_Status', ['Resolved', 'Closed', 'Canceled'])->where('Request_Type', 'Request')->count()) ?>;

    var chart = new Highcharts.Chart({
        title: {
            text: 'Request',
            align: 'left',
            margin: 0,
            style: {
                fontFamily: 'Montserrat',
                fontSize:12,
                fontWeight:'bold',
            },
        },
        chart: {
            renderTo: 'progress-request',
            type: 'bar',
            height: 60,
            style: {
                fontFamily: 'Montserrat'
            },
        },
        credits: false,
        tooltip: false,
        legend: false,
        navigation: {
            buttonOptions: {
                enabled: false
            }
        },
        xAxis: {
            visible: false,
        },
        yAxis: {
            visible: false,
            min: 0,
            max: total_request,
        },
        series: [{
            data: [total_request],
            grouping: false,
            animation: false,
            enableMouseTracking: false,
            showInLegend: false,
            color: '#D9D9D9',
            pointWidth: 25,
            borderWidth: 0,
            borderRadius: 5,
            borderRadiusTopLeft: '4px',
            borderRadiusTopRight: '4px',
            borderRadiusBottomLeft: '4px',
            borderRadiusBottomRight: '4px',
            dataLabels: {
                className: 'highlight',
                format: request_completed + '/'+total_request,
                enabled: true,
                align: 'right',
                style: {
                    color: 'black',
                    textOutline: false,
            }
            }
        }, 
        {
            enableMouseTracking: false,
            data: [request_completed],
            borderRadiusBottomLeft: '4px',
            borderRadiusBottomRight: '4px',
            borderRadius: 5,
            color: '#148A9D',
            borderWidth: 0,
            pointWidth: 25,
            animation: {
                duration: 250,
            },
                dataLabels: {
                enabled: true,
                inside: true,
                align: 'left',
                format: '',
                style: {
                    color: 'white',
                    textOutline: false,
                }
            }
        },
    ]
        });
   
</script>


//{{-- Progress Bar Incident --}}
<script>
    var total_incident = <?php echo json_encode($tiket->where('Request_Type', 'Incident')->count()) ?>;
    var incident_completed = <?php echo json_encode($tiket->whereIn('Request_Status', ['Canceled', 'Resolved', 'Closed'])->where('Request_Type', 'Incident')->count()) ?>;

    var chart = new Highcharts.Chart({
        title: {
            text: 'Incident',
            align: 'left',
            margin: 0,
            style: {
                fontFamily: 'Montserrat',
                fontSize:12,
                fontWeight:'bold',
            },
        },
        chart: {
            renderTo: 'progress-incident',
            type: 'bar',
            height: 60,
            style: {
                fontFamily: 'Montserrat'
            },
        },
        credits: false,
        tooltip: false,
        legend: false,
        navigation: {
            buttonOptions: {
            enabled: false
            }
        },
        xAxis: {
            visible: false,
        },
        yAxis: {
            visible: false,
            min: 0,
            max: total_incident,
        },
        series: [{
            data: [total_incident],
            grouping: false,
            animation: false,
            enableMouseTracking: false,
            showInLegend: false,
            color: '#D9D9D9',
            pointWidth: 25,
            borderWidth: 0,
            borderRadius: 5,
            borderRadiusTopLeft: '4px',
            borderRadiusTopRight: '4px',
            borderRadiusBottomLeft: '4px',
            borderRadiusBottomRight: '4px',
            dataLabels: {
                className: 'highlight',
                format: incident_completed + '/'+total_incident,
                enabled: true,
                align: 'right',
                style: {
                    color: 'black',
                    textOutline: false,
            }
            }
        }, 
        {
            enableMouseTracking: false,
            data: [incident_completed],
            borderRadiusBottomLeft: '4px',
            borderRadiusBottomRight: '4px',
            borderRadius: 5,
            color: '#228E3B',
            borderWidth: 0,
            pointWidth: 25,
            animation: {
                duration: 250,
            },
                dataLabels: {
                enabled: true,
                inside: true,
                align: 'left',
                format: '',
                style: {
                    color: 'white',
                    textOutline: false,
                }
            }
        },
    ]
        });
   
</script>

// {{-- Pie Chart Teknisi tiket--}}

<script>
    var teknisi_tiket = <?php echo json_encode($teknisi_tiket) ?>;
    var total_tiket = <?php echo json_encode($teknisi_tiket->count()) ?>;
    var teknisi = <?php echo json_encode($nama_teknisi) ?>;
    var others = 0

    for (let i = 5; i < teknisi_tiket.length; i++) {
        others += teknisi_tiket[i].count;
    };
    
    
    Highcharts.setOptions({
        chart: {
            style: {
                fontFamily: 'Montserrat'
            }
        }
    });
    Highcharts.chart('piechart-tiket-teknisi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<span style="font-weight:bold;">Ticket in Technician</span>',
            align: 'left',
            
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                showInLegend: false,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: <br> {point.y} Ticket ({point.percentage:.1f}%)'
                }
            }
        },
        series: [{
            name: 'Persentase Tiket',
            colorByPoint: true,
            data: 
            [    
                {
                name: teknisi[0],
                y: teknisi_tiket[0].count,
                sliced: true,
                selected: true
                
            },
            {
                name: teknisi[1],
                y: teknisi_tiket[1].count
            },
            {
                name: teknisi[2],
                y: teknisi_tiket[2].count
            },
            {
                name: teknisi[3],
                y: teknisi_tiket[3].count
            },
            {
                name: teknisi[4],
                y: teknisi_tiket[4].count
            },
            {
                name: 'Others',
                y: others
            },
            
            
        ]
    }]
});
</script>

// {{-- Pie Chart Teknisi task--}}
<script>
    var teknisi_task = <?php echo json_encode($teknisi_task) ?>;
    var total_tiket = <?php echo json_encode($teknisi_task->count()) ?>;
    var teknisi = <?php echo json_encode($nama_teknisi_task) ?>;
    var others = 0

    for (let i = 5; i < teknisi_task.length; i++) {
        others += teknisi_task[i].count;
    };


    Highcharts.setOptions({
        chart: {
            style: {
                fontFamily: 'Montserrat'
            }
        }
    });
    Highcharts.chart('piechart-task-teknisi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<span style="font-weight:bold;">Ticket in Technician</span>',
            align: 'left',
            
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                showInLegend: false,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: <br> {point.y} Ticket ({point.percentage:.1f}%)'
                }
            }
        },
        series: [{
            name: 'Persentase Tiket',
            colorByPoint: true,
            data: 
            [    
            {
                name: teknisi[0],
                y: teknisi_task[0].count,
                sliced: true,
                selected: true
                
            },
            {
                name: teknisi[1],
                y: teknisi_task[1].count
            },
            {
                name: teknisi[2],
                y: teknisi_task[2].count
            },
            {
                name: teknisi[3],
                y: teknisi_task[3].count
            },
            {
                name: teknisi[4],
                y: teknisi_task[4].count
            },
            {
                name: 'Others',
                y: others
            },
            
            
        ]
    }]
});

</script>
//{{-- Line Chart Monthly Recap --}}
<script type="text/javascript">
    var tiket_complete = <?php echo json_encode($tiket_complete) ?>;
    var tiket_in_progress = <?php echo json_encode($tiket_in_progress) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('grafik', {
        
        title: {
            text: ''
        },
        xAxis:{
            categories: bulan
        },
        yAxis:{
            title:{
                text : 'Jumlah Tiket'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
            }
        },
        series:
        [
            {
                name: 'Ticket Complete',
                color:'green',
                data: tiket_complete
            },
            {
                name: 'Ticket In Progress',
                color:'#EAB600',
                data: tiket_in_progress
            }
            ]
        });
</script>
@endsection

                
             