 var loadData = () => {
    $.ajax({
        url: url + 'getAllSalesData.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#sales').html(response.Data.Sale);
               $('#sold').html(response.Data.Quantity);
               $('#totalInv').html(response.Data.inv);
            }
        }
    });
};
var Sale = [];
const loadSale = () => {
    $.ajax({
        url: url + 'getSaleData.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            if (response.Data != null) {
                var n = response.Data.length;
                for(var i=0;i<n;i++){
                    Sale.push(parseFloat(response.Data[i].sale));
                }
            }
            load_sales(Sale);
        }
    });
};
var Dount = [];
const load_category = () => {
    $.ajax({
        url: url + 'getDonutData.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            var d;
            if (response.Data != null) {
                var n = response.Data.length;
                for(var i=0;i<n;i++){
                    d = {'name':response.Data[i].category,'y':parseFloat(response.Data[i].point)};
                    Dount.push(d);
                }
            }
            load_donut(Dount);
        }
    });
};
loadData();
loadSale();
load_category();

function load_donut(donut){
Highcharts.chart('donuts', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Kissan Agro Sales-2020'  
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
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Categories',
        colorByPoint: true,
        data: donut
    }]
});
}
function load_sales(saleData){
Highcharts.chart('Sales', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        }
    },
    title: {
        text: 'Sales Chart'
    },
    subtitle: {
        text: 'Notice the difference between a 0 value and a null point'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: Highcharts.getOptions().lang.shortMonths,
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series: [{
        name: 'Sales',
        data: saleData
    }]
});
}