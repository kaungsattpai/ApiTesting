<html>
    <head>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            // var barChart = document.getElementById("barChart");
            // barChart.addEventListener("click", function(){
            //     alert('here');
            // })

            // document.getElementById("barChart").addEventListener("click", function() {
            //     alert("Hello World!");
            // });

            function changeChart(){
                var e = document.getElementById("chartType");
                var chartType = e.options[e.selectedIndex].value;
                
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Fruit Consumption'
                    },
                    xAxis: {
                        categories: ['Apples', 'Bananas', 'Oranges', 'Watermelon']
                    },
                    yAxis: {
                        title: {
                            text: 'Fruit eaten'
                        },
                    },
                    series: [{
                        name: 'Jane',
                        data: [1, 2, 4, 1]
                    }, {
                        name: 'John',
                        data: [5, 7, 3, 2]
                    }, {
                        name: 'Kate',
                        data: [2, 3, 1, parseInt(chartType)]
                    }]
                });
            }

            document.addEventListener('DOMContentLoaded', function () {
                Highcharts.chart('container', {
                chart: {
                    type: 'spline',
                    inverted: true
                },
                title: {
                    text: 'Atmosphere Temperature by Altitude'
                },
                subtitle: {
                    text: 'According to the Standard Atmosphere Model'
                },
                xAxis: {
                    reversed: false,
                    title: {
                        enabled: true,
                        text: 'Altitude'
                    },
                    labels: {
                        format: '{value} km'
                    },
                    maxPadding: 0.05,
                    showLastLabel: true
                },
                yAxis: {
                    title: {
                        text: 'Temperature'
                    },
                    labels: {
                        format: '{value}°'
                    },
                    lineWidth: 2
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br/>',
                    pointFormat: '{point.x} km: {point.y}°C'
                },
                plotOptions: {
                    spline: {
                        marker: {
                            enable: false
                        }
                    }
                },
                series: [{
                    name: 'Temperature',
                    data: [[0, 15], [10, -50], [20, -56.5], [30, -46.5], [40, -22.1],
                        [50, -2.5], [60, -27.7], [70, -55.7], [80, -76.5]]
                }, {
                    name: 'Temperature2',
                    data: [[10, 15], [20, -50], [30, -56.5], [40, -46.5], [50, -22.1],
                        [60, -2.5], [70, -27.7], [80, -55.7], [90, -76.5]]
                }]
            });
            });

            function changeNewChart(chartType){
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: chartType
                    },
                    title: {
                        text: 'Fruit Consumption'
                    },
                    xAxis: {
                        categories: ['Apples', 'Bananas', 'Oranges', 'Watermelon']
                    },
                    yAxis: {
                        title: {
                            text: 'Fruit eaten'
                        },
                        labels: {
                            format: '{value} lone'
                        },
                    },
                    series: [{
                        name: 'Jane',
                        data: [1, 0, 4, 1]
                    }, {
                        name: 'John',
                        data: [5, 7, 3, 2]
                    }, {
                        name: 'Kate',
                        data: [2, 3, 1, 5]
                    }]
                });
            }
        </script>

        <style>
            #chart_image_area div {
                float: left;
                height: 25%;
                weight: 20%;
                margin-left: 5%;
                margin-bottom: 10%;
            }

            #chart_image_area div p {
                text-align: center;
            }

            .chart_image {
                height: 100%;
                weight: 100%;
            }
        </style>
    </head>
    
    <body>
        <div style="margin: 10%">
            <div id='chart_image_area'>
                <div id="barChart" onclick="changeNewChart('bar')">
                    <img class="chart_image" src="/images/bar_chart.jpg" alt="" value="bar">
                    <p>Bar Chart</p>
                </div>
                <div onclick="changeNewChart('column')">
                    <img class="chart_image" src="/images/column_chart.jpg" alt="">
                    <p>Column Chart</p>
                </div>
                <div onclick="changeNewChart('pie')">
                    <img class="chart_image" src="/images/pie_chart.jpg" alt="">
                    <p>Pie Chart</p>
                </div>
                <div onclick="changeNewChart('line')">
                    <img class="chart_image" src="/images/line_chart.jpg" alt="">
                    <p>Line Chart</p>
                </div>
            </div>
            
            <!-- <div style='clear: both'>
                <select id='chartType' style='margin-bottom: 5%' onchange="changeChart()">
                    <option value="column" selected="selected">column</option>
                    <option value="line">line</option>
                    <option value="bar">bar</option>
                    <option value="pie">pie</option>
                </select>
            </div> -->
            <div style='clear: both'>
                <select id='chartType' style='margin-bottom: 5%' onchange="changeChart()">
                    <option value="1" selected="selected">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            
            <div id="container" style="width:100%; height:400px;"></div>
        </div>
    </body>
</html>