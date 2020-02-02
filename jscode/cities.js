var states = new Map();
var cities = new Map();

getStates();
getCities();
console.log('in citie');
function getStates() {
    $.ajax({
        url: url + 'getStates.php',
        type: 'POST',
        dataType: 'json',
        async:false,
        success: function(response) {
            console.log(response);
            if (response.Responsecode == 200) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    states.set(response.Data[i].id, response.Data[i]);
                }
            }
        }
    });
}

function getCities() {
    $.ajax({
        url: url + 'getCities.php',
        type: 'POST',
        dataType: 'json',
        async:false,
        success: function(response) {
            if (response.Responsecode == 200) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    cities.set(response.Data[i].id, response.Data[i]);
                }
            }
        }
    });
}


