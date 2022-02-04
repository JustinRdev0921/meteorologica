$(document).ready(function() {
    $(function() {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Viento'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' '
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 50,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Viento',
                data: [30, 20, 15, 15, 20, 30, 15]
            }, {
                name: 'Viento Max',
                data: [12, 23, 40, 39, 35, 32, 30]
            }, {
                name: 'Viento Min',
                data: [20, 15, 22, 12, 11, 0, 5]
            }]
        });
    });
})