var varExistUrl = function(variable){
    var $_GET = {};
    if(document.location.toString().indexOf('?') !== -1) {
        var query = document.location
                       .toString()
                       // get the query string
                       .replace(/^.*?\?/, '')
                       // and remove any existing hash string (thanks, @vrijdenker)
                       .replace(/#.*$/, '')
                       .split('&');

        for(var i=0, l=query.length; i<l; i++) {
           var aux = decodeURIComponent(query[i]).split('=');
           $_GET[aux[0]] = aux[1];
        }
    }

    if(typeof $_GET[variable] != "undefined"){
        return true;
    }else{
        return false;
    }
}

$(document).ready(function() {

    if(varExistUrl('page') || $(".alert").val() == ""){
        $('.content').show();
    }else{
        $('.content').show('slide');
    }

    $('#table-produtos').show('blind');
    $('.alert').effect('bounce');
    $('.alert').show(function(){
        $('.content').effect('highlight', { color: "#FF7F7F" });
        $(this).delay(5000).hide('bounce');
    });

    $('.btnDelete').click(function(){
        $('.content').hide('explode',{},1000);
    });

});

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Percentual de produtos por categoria'
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
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Quant.',
        colorByPoint: true,
        data: categorys
    }]
});