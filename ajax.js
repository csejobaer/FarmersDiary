


$(document).ready(function(){


    


    function containsAnyLetter(str) {
        
        return /[a-zA-Z]/.test(str);
      }


    jQuery("#saveItem").click(function(){
        var sellerPhone = $("#sellerPhone").val();
        var sellerType = $("#sellerType").val();
        var product = $("#product").val();
        var weight = $("#weight").val();
        var price = $("#price").val();
        var vat = $("#vat").val();
        var flag = 0;
        var additionalCharge = $("#additionalFees").val();

        let errorArr = {};
        if(sellerPhone.length <1){
            document.querySelector("#errorFound").innerHTML = "Phone number is required";
            flag = 1;
        }else if (sellerPhone.length != 11) {
            document.querySelector("#errorFound").innerHTML = "Phone number invalid";
            flag = 1;
            
        } else if (sellerPhone[0] != "0" || sellerPhone[1] != "1") {
            document.querySelector("#errorFound").innerHTML = "Phone number invalid";
            flag = 1;
        }else{
            document.querySelector("#errorFound").innerHTML = "";

        }

        if(sellerType.length == 4){
            document.querySelector("#userNotFound").innerHTML = "Please select user type";
            flag = 1;
        }else{
            
            document.querySelector("#userNotFound").innerHTML = "";
        }

        if(product.length < 1){
            document.querySelector("#userproduct").innerHTML = "Enter the name of your product";
            flag = 1;
        }else{
            
            document.querySelector("#userproduct").innerHTML = "";
        }
        if(weight.length < 1){
            document.querySelector("#userweight").innerHTML ="Enter the product weight";
            flag = 1;
            
        }else if(containsAnyLetter(weight)){
            document.querySelector("#userweight").innerHTML = "Don't write any char values here";
            flag = 1;
            
        }else{
            
            document.querySelector("#userweight").innerHTML = "";
        }

        if(price.length < 1){
            document.querySelector("#userprice").innerHTML = "Price number is required";
            flag = 1;
            
        }else if(containsAnyLetter(price)){
            document.querySelector("#userprice").innerHTML = "Don't write any char value here";
            flag = 1;
            
        }else{
            
            document.querySelector("#userprice").innerHTML = "";
        }

        if(vat.length < 1){
            document.querySelector("#pvat").innerHTML = "Vat is required if there is no vat write 0 here";
            flag = 1;
        }else if(containsAnyLetter(vat)){
            document.querySelector("#pvat").innerHTML = "Invalid input";
            flag = 1;
            
        }else{
            
            document.querySelector("#pvat").innerHTML = "";
        }
        
        if(additionalCharge.length < 1){
            document.querySelector("#addfee").innerHTML ="Extra-charge is required, if there is no extra write 0 here";
            flag = 1;
            
        }else if(containsAnyLetter(additionalCharge)){
            document.querySelector("#addfee").innerHTML ="Invalid input";
            flag = 1;
            
        }else{
            
            document.querySelector("#addfee").innerHTML = "";
        }
        let confirmation = 1;
        // if(flag == 0){
        //     $.ajax({
        //         'url': 'ajax/ajax-phone-validation.php',
        //         'success': function(info){
        //             alert("This user does not exits");
        //             confirmation = 0;
        //         },
        //         'type': 'post',
        //         'data': {
        //             'phone': sellerPhone,
        //             'sellerType': sellerType
        //             }
                    
        //         }
        //     );
        // }

       if(flag == 0){
            $.ajax({
                'url': 'ajax.php',
                'success': function(data){
                        document.querySelector("#notify").innerHTML = data;
                 

                },
                'error': function(error) {
                    document.querySelector("#notify").innerHTML = "This user does not exits.";
                },
                'type': 'post', 
                'data': {
                    'phone': sellerPhone,
                    'sproduct': product,
                    'sweight' : weight,
                    'sprice': price,
                    'svat':  vat,
                    'additionalCharges': additionalCharge,
                    'sellerType': sellerType
    
                }
    
            });


        sellerPhone = $("#sellerPhone").val("");
        product = $("#product").val("");
        weight = $("#weight").val("");
        price = $("#price").val("");
        vat = $("#vat").val("");
        flag = 0;
        additionalCharge = $("#additionalFees").val("");

        }
        return false;
     
    });

/*--------------------------------------------------------------

Auto update Ajax

---------------------------------------------------------------*/

/*
function loadlinkBoughtItem(){
    $('#dataTable').load('bought-product.php',function () {
         $(this).unwrap();
    });
}

loadlinkBoughtItem(); // This will run on page load
setInterval(function(){
    loadlinkBoughtItem() // this will run after every 5 seconds
}, 5000)


*/






});





