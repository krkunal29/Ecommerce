// var blogcategoryList = new Map(); // category Map

const dashboardcount = () => {
    $.ajax({
        url: url + 'dasboardcount.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                // console.log(response.Data);
              $("#hblogsp").html(response.Data.blogcount);
              $("#tblogsp").html(response.Data.blogcount);
              $("#blogsp").html(response.Data.blogcount);
              $("#hproductsp").html(response.Data.productcount);
              $("#tproductsp").html(response.Data.productcount);
              $("#productsp").html(response.Data.productcount);
              $("#husercountsp").html(response.Data.usercount);
              $("#tusercountsp").html(response.Data.usercount);
              $("#usercountsp").html(response.Data.usercount);
              $("#hcategorycountsp").html(response.Data.categorycount);
              $("#tcategorycountsp").html(response.Data.categorycount);
              $("#categorycountsp").html(response.Data.categorycount);
              $("#subblogcountsp").html(response.Data.blogcatcount);
              $("#subcategorycountsp").html(response.Data.subcatcount);
              $("#taxcountsp").html(response.Data.taxcount);
              $("#unitcountsp").html(response.Data.unitcount);
            }
        }
    });
}
dashboardcount();

const userinfo = () => {
    $.ajax({
        url: url + 'dasboarduserinfo.php',
        type: 'POST',
        data :{
         userId :data.userId
        },
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                 // console.log(response.Data);
                $("#spanname").html(response.Data.fname+" "+response.Data.lname);
                $("#spanemail").html(response.Data.emailId);
                $("#spanphone").html(response.Data.contactNumber);
                $("#spanaddress").html(response.Data.contactAddress);
                $("#spancity").html(response.Data.city);
                $("#spanstate").html(response.Data.state);
                $("#spancountry").html(response.Data.country);
                $("#cityId").val(response.Data.city);
                $("#stateId").val(response.Data.state);
                $("#countryId").val(response.Data.country);
                var src = url + "user/" +data.userId + ".jpg";
                // $('#prevImage').attr("src", src);
                $('#previmg1').attr("src", src);

            }
        },
        complete:function(){
          weatheapi();
        }
    });
}
userinfo();

const weatheapi = () =>{
  var cityId =$("#cityId").val();
  var stateId =$("#stateId").val();
  var countryId =$("#countryId").val();
  console.log(cityId);
  $.ajax({
      url: 'https://api.openweathermap.org/data/2.5/weather?q='+cityId+','+stateId+','+countryId+ '&APPID=42be6d3bf5a5b085daa9334c48be4eb2',
      type: 'POST',
      data :{
       userId :data.userId
      },
      dataType: 'json',
      success: function(response) {
         console.log(response);
          if (response.cod == 200) {
               // console.log(response.name);
                $("#currenttemp").html((parseFloat(response.main.temp)-274.00).toFixed(2));
                $("#tempcityname").html(response.name);
                $("#tempwindname").html(response.wind.speed);
                $("#temphumidityname").html(response.main.humidity);
                $("#temppressurename").html(response.main.pressure);
                $("#tempweathercond").html(response.weather[0].main);
                $("#tempcitymaxname").html((parseFloat(response.main.temp_max)-274.00).toFixed(2));
                $("#tempcityminname").html((parseFloat(response.main.temp_min)-274.00).toFixed(2));
          }
          else {
            $("#currenttemp").html(35.00);
            $("#tempcityname").html("unknown");
            $("#tempwindname").html("0.0");
            $("#temphumidityname").html("0.0");
            $("#temppressurename").html("0.0");
            $("#tempweathercond").html("0.0");
            $("#tempcitymaxname").html(35.00);
            $("#tempcityminname").html(35.00);
          }
      },
      complete:function(){

      }
  });
}
