<html>
<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var students = <?php echo $students; ?>;
        console.log(students);

        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Fruit Consumption'
                },
                xAxis: {
                    categories: ['2015', '2016', '2017', '2018', '2019']
                },
                yAxis: {
                    title: {
                        text: 'Total Student'
                    },
                    labels: {
                        format: '{value}'
                    },
                },
                series: [{
                    name: 'php',
                    data: [0, 100, 120, 140, 180]
                }, {
                    name: 'java',
                    data: [150, 0, 170, 130, 200]
                }]
            });
        });
    </script>
</head>
<body>
    <div style='margin: 15%'>
        <div id="container" style="width:100%; height:400px;"></div>
    </div>
</body>
</html>