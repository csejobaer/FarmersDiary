$( document ).ready(function() {
    // Tread license field  
    $('.tread').hide();
    $('select#type').on('change', function() {
        var values = $(this).val();
        
        if(values == 'farmer'){
            $('.tread').hide();
        }else{
            $('.tread').fadeIn();
        }
      });
    var path = window.location.pathname.split("/").pop();
    if( path == ''){
    path = 'index.html';
    }
    var terget = $('.admin-menu-area li a[href="'+path+'"]');
    terget.parent('li').addClass('active');

});
   $( document ).ready(function() { 

    // Login validation
    $("#submit").click(function(){
      const mobile = $("#mobile").val();
      const password = $("#password").val();
      if (mobile.length != 11) {
        return false;
      }else if (mobile[0] != "0" || mobile[1] !="1") {
        $(".error").append("Invalid Phone");
        return false;
      }
      if(password.length < 5){
        return false;
      }
    });
  // add the rule here
 $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Select country.");
    $("#login_form").validate({
        rules: {

            mobile: {
                required: true,
                minlength:11,
                maxlength:11
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            mobile: {
                required: "11 Digite required",
                minlength: "11 Digit number required",
                maxlength: "Don't write more then 11 digit"
            },
            password: {
                required: "Password required",
                minlength: "Minimum length 6"
            }
        }
    });
    // Registration 
    // Registration 
    $("#regSubmit").click(function(){
        const mobile = $("#phone").val();
        const password = $("#password").val();
        const fname = $("#fname").val();
        const lname = $("#lname").val();
        const email = $("#email").val();
        const country = $("#country").val();
        const district = $("#district").val();
        const police = $("#police").val();
        const address = $("#address").val();
        const type = $("#type").val();
        const tread = $("#tread").val();

        if (mobile.length != 11) {
            return false;
        }
        if (mobile[0] != "0" || mobile[1] !="1") {
            return false;
        }
        if(password.length < 5){
            return false;
        }
        if (fname.length <= 2) {
            return false;
        }
        if(lname.length <= 2) {
            return false;
        }
        if(country == "default"){
            return false;
        }
        if(district == "default"){
            return false;
        }
        if(police == "default"){
            return false;
        }
        if(address.length <= 2){
            return false;
        }

        var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

        var emailFormat = re.test($("#email").val()); // This return result in Boolean type

        if (emailFormat != true) {
            return false;
        }
        if(type != "farmer"){
            if(tread.length <7){
                return false;
            }
        }


    });



    $("#registrationForm").validate({
        rules: {

            fname: {
                required: true,
                minlength:2
            },
            lname: {
                required: true,
                minlength:2
            },
            email: {
              email: true
            },
            phone: {
                required: true,
                minlength:11,
                maxlength:11
            },
            password: {
                required: true,
                minlength: 6
            },
            address: {
              required: true,
              minlength: 4
            },
            country: {
              valueNotEquals: "default"
            }, 
            district: {
              valueNotEquals: "default"
            }, 
            police: {
              valueNotEquals: "default"
            }
        },
        messages: {
            fname: {
                required: "First name is required",
                minlength: "Minimum 2 char number required"
            },
            lnme: {
                required: "Last name is required",
                minlength: "Minimum 2 char number required"
            },
            phone: {
                required: "11 Digite required",
                minlength: "11 Digit number required",
                maxlength: "Don't write more then 11 digit"
            },
            password: {
                required: "Password required",
                minlength: "Minimum length 6"
            },
            address: {
              required: "Address is required"
            },
            country: {
              valueNotEquals: "Please select your country!" 
            }, 
            district: {
              valueNotEquals: "Please select your District"
            },
            police: {
              valueNotEquals: "Please select your Upazilla"
            }
        }
    });






});






    /*------------------------Line Diagram------------------------------*/
    
   
   
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Januray', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Bought Itema',
            data: [12, 19, 55, 66, 22, 44, 23, 76, 34, 21, 33, 11],
            backgroundColor: 'tranparent',
            borderColor: 'green',
            borderWidth: 1
        }, {
            label: 'Sold Items',
            data: [1, 2, 43, 22, 24, 53, 32, 42, 66, 23, 57, 75],
            backgroundColor: 'tranparent',
            borderColor: 'red',
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

const doughnut = document.getElementById('doughnut').getContext('2d');

const doughnutAnalysis = new Chart(doughnut, {
    type: 'pie',
    data: {
        labels: [
            'Due',
            'Paid'
          ],
          datasets: [{
            label: 'Buyer and Seller Ration',
            data: [40, 60],
            backgroundColor: [
              '#3B3B98',
              '#b71540'
            ],
            hoverOffset: 3,
            borderWidth: 2,
          }],
    },
    borderAlign: 'inner',
    options: {
        responsive: false,
        plugins: {
            legend: {
                position: 'right'
            }
        }
    }

    


});
const pieChart = document.getElementById('pieChart').getContext('2d');

const pieChartAnalysis = new Chart(pieChart, {
    type: 'doughnut',
    data: {
        labels: [
            'Seller',
            'Buyer'
          ],
          datasets: [{
            label: 'Buyer and Seller Ration',
            data: [40, 60],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)'
            ],
            hoverOffset: 3,
            borderWidth: 2,
          }],
    },
    borderAlign: 'inner',
    options: {
        responsive: false,
        plugins:{
            legend: {
                position: 'right'
            }
        }
    }

    


});






const circle = document.getElementById('cirlces').getContext('2d');
const cirlces = new Chart(circle, {
    type: 'bar',
    data: {
        labels: ['Januray', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Bought Itema',
            data: [12, 19, 55, 66, 22, 44, 23, 76, 34, 21, 33, 11],
            backgroundColor: 'tranparent',
            borderColor: 'green',
            borderWidth: 1
        }, {
            label: 'Sold Items',
            data: [1, 2, 43, 22, 24, 53, 32, 42, 66, 23, 57, 75],
            backgroundColor: 'tranparent',
            borderColor: 'red',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            },
        },
        plugins: {
            legend: {
                position: 'bottom'
            },
        }
    }

});
/*------------------------end Line Diagram------------------------------*/    
/*------------------------Google map------------------------------*/

    let map;

    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-33.91722, 151.23064),
        zoom: 16,
      });
    
      const iconBase ="https://developers.google.com/maps/documentation/javascript/examples/full/images/";
      const icons = {
        parking: {
          icon: iconBase + "parking_lot_maps.png",
        },
        library: {
          icon: iconBase + "library_maps.png",
        },
        info: {
          icon: iconBase + "info-i_maps.png",
        },
      };
      const features = [
        {
          position: new google.maps.LatLng(-33.91721, 151.2263),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91539, 151.2282),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91747, 151.22912),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.9191, 151.22907),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91725, 151.23011),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91872, 151.23089),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91784, 151.23094),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91682, 151.23149),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.9179, 151.23463),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91666, 151.23468),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.916988, 151.23364),
          type: "info",
        },
        {
          position: new google.maps.LatLng(-33.91662347903106, 151.22879464019775),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.916365282092855, 151.22937399734496),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.91665018901448, 151.2282474695587),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.919543720969806, 151.23112279762267),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.91608037421864, 151.23288232673644),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.91851096391805, 151.2344058214569),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.91818154739766, 151.2346203981781),
          type: "parking",
        },
        {
          position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
          type: "library",
        },
      ];
    
      // Create markers.
      for (let i = 0; i < features.length; i++) {
        const marker = new google.maps.Marker({
          position: features[i].position,
          icon: icons[features[i].type].icon,
          map: map,
        });
      }
    }
    
    window.initMap = initMap;
