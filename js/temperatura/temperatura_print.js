let dias = []
let temps = []
let temps_max = []
let temps_min = []

$(document).ready(function() {
    var path = $(location).attr('pathname')
    var pathfile = path.split('/')
    var lg = pathfile.length - 1
    if (pathfile[lg] == 'index.php') {
        imprimirTemperaturaInicio();
    } else if (pathfile[lg] == 'temperatura.php') {
        let count = 0;
        while (count < 7) {
            count++;
            imprimirTemperatura(count);
            sleep(50)
        }

    }
})

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

function diaSemana(fecha) {
    var dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
    var dt = new Date(fecha);
    return dias[dt.getUTCDay()];
};

function imprimirTemperaturaInicio() {

    $.ajax({
            url: 'php/functions/temperatura/selectInicio.php'
        })
        .done(function(result) { //contador necesario
            $('#temperatura_inicio').html(result)
        })
        .fail(function() {
            alert('Error al cargar las temperaturas')
        })
}

async function imprimirTemperatura(num) {
    $.ajax({
            type: 'POST',
            url: 'php/functions/temperatura/selectChart.php',
            data: { 'num': num }
        })
        .done(function(result) {
            let obj = $.parseJSON(result);
            let dia = diaSemana(obj.fecha);
            let temperatura_promedio = (parseInt(obj.temperatura_max) + parseInt(obj.temperatura_min)) / 2;
            temps.push(temperatura_promedio);
            dias.push(dia);
            temps_max.push(parseInt(obj.temperatura_max));
            temps_min.push(parseInt(obj.temperatura_min));

            highchart();
        })
        .fail(function() {
            alert('Error al cargar las temperaturas')
        })
}

function highchart() {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Temperatura'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: dias,
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
            name: 'Temperatura',
            data: temps
        }, {
            name: 'Temperatura Max',
            data: temps_max
        }, {
            name: 'Temperatura Min',
            data: temps_min
        }]
    });
}