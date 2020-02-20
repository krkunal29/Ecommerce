 var loadData = () => {
    $.ajax({
        url: url + 'month.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#saleMonth').html(response.Data.Sale);
               $('#soldMonth').html(response.Data.Quantity);
               $('#invMonth').html(response.Data.inv);
            }
        }
    });
};
var loadData_year = () => {
    $.ajax({
        url: url + 'year.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#saleYear').html(response.Data.Sale);
               $('#soldYear').html(response.Data.Quantity);
               $('#invYear').html(response.Data.inv);
            }
        }
    });
};
loadData_year();
var loadData_today = () => {
    $.ajax({
        url: url + 'today.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#saleToday').html(response.Data.Sale);
               $('#soldToday').html(response.Data.Quantity);
               $('#invToday').html(response.Data.inv);
            }
        }
    });
};
loadData_today();
var loadData_yesterday = () => {
    $.ajax({
        url: url + 'yesterday.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#saleYest').html(response.Data.Sale);
               $('#soldYest').html(response.Data.Quantity);
               $('#invYest').html(response.Data.inv);
            }
        }
    });
};
loadData_yesterday();
var loadData_return = () => {
    $.ajax({
        url: url + 'return.php',
        type: 'POST',
        dataType: 'json',
        data:{roleId:data.roleId,userId:data.userId},
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#returnToday').html(response.Data.today);
               $('#returnYester').html(response.Data.yester);
               $('#returnMon').html(response.Data.mon);
               $('#returnYer').html(response.Data.yer);
            }
        }
    });
};
loadData_return();

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