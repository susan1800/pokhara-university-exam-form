<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method</title>
</head>
<body>

@php
     $totalfee = $_GET['totalfee'];
 @endphp

 {{ \Crypt::decryptString($totalfee) }}
 <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

 <style>
    .paymentWrap {
	padding: 50px;
}

.paymentWrap .paymentBtnGroup {
	max-width: 800px;
	margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
	padding: 40px;
    height: 250px;
	box-shadow: none;
	position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
	outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
	border-color: #4cd264;
	outline: none !important;
	box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
	position: absolute;
	right: 3px;
	top: 3px;
	bottom: 3px;
	left: 3px;
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	border: 2px solid transparent;
	transition: all 0.5s;
}

.khalti{
    background-image: url("/frontend/image/khalti.jpg");
}
.cashondesk{
    background-image: url("/frontend/image/cashondesk.jpg");
}
.esewa{
    background-image: url("/frontend/image/esewa.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
	border-color: #4cd264;
	outline: none !important;
    display: flex;
}
 </style>

 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->
 
 <div class="container">
     <div class="row">
         <div class="paymentCont">
                         <div class="headingWrap">
                                 <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                         </div>
                         <div class="paymentWrap">
                             <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                 
                                 <label class="btn paymentMethod" id="payment-button">
                                     <div class="method khalti"></div>
                                     <input type="radio" name="options"> 
                                 </label>
                                 <label class="btn paymentMethod">
                                     <div class="method cashondesk"></div>
                                     <input type="radio" name="options">
                                 </label>
                                 <label class="btn paymentMethod">
                                    <div class="method esewa"></div>
                                    <input type="radio" name="options">
                                </label>
                                 
                                 
                              
                             </div>        
                         </div>
                         
                     </div>
         
     </div>
 </div>



 <script>
    var config = {
        // replace the publicKey with yours
        "publicKey": "test_public_key_c3b709bf9ed244b9a897e3cd1c699820",
        "productIdentity": "180130",
        "productName": "susan",
        "productUrl": "http://127.0.0.1:8000/admin",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
            ],
        "eventHandler": {
            onSuccess (payload) {
                // hit merchant api for initiating verfication
                 // hit merchant api for initiating verfication
                 console.log(payload);
                if(payload.idx){
                    $.ajax({
                            type : 'POST',
                            url : "{{ route('khalti.payment.check')}}",
                            //  routekhalti.verifyPayment 
                            data: {
                                token : payload.token,
                                amount : payload.amount,
                                product_identity : payload.product_identity,
                                "_token" : "{{ csrf_token() }}"
                            },
                            success : function(res){
                               
                                        if(res == 1){
                                            window.location.href = "{{route('submit.complete')}}";
                                        }else{
                                            Swal.fire('Something Wrong Please try again !')
                                        }
                                        
                                    
                            },
                                    error: function (res) {  Swal.fire('Something Wrong Please try again !') }
                        });
                }


            },
            onError (error) {
                console.log(error);
            },
            onClose () {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({amount: 1000});
    }
</script>