
<html>
    <head>
        <title>Exam Form</title>

<link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/core.css') }}">
<link rel="stylesheet" href="{{ asset('css/sign.css') }}">



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style>
        .dropbtn {
          background-color: #04AA6D;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }

        .dropdown {


        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          box-shadow: 0px 8px 16px 0px rgba(53, 52, 52, 0.2);
          z-index: 1;
          width:300px;
          padding: 5px;
        }

        .dropdown-content a {
        background-color: #f1f1f1;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          color: rgb(43, 42, 42);
          text-decoration: none;
          display: block;
          padding:5px;
          margin-bottom: 4px;
          margin-top: 2px;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark ">
        <div class="dropdown">
        <button class="navbar-toggler dropbtn" style="width: auto;" type="button" data-toggle="modal" data-target="#exampleModalCenter">
          <span class="navbar-toggler-icon"></span>
        </button>
        <br>
        <div class="dropdown-content">
            <a href="{{route('user.changepassword.view')}}"><h6 >Change Password  <span style="float: right;"><i class="fa fa-key"></i></span></h5></a>
            <a href="{{route('userlogout')}}"><h6>Logout <span style="float: right;"><i class="fa fa-sign-out"></i><span></h5></a>


          </div>
        </div>
        <div style="text-align: center;padding:auto;margin:auto">
            <img class="text-white p-2" src="{{asset('/logo/cosmos.png')}}" width="180">
        </div>


      </nav>







<div style="padding: 10px;">
{{-- <div class="aiz-titlebar text-left mt-2 mb-3 text-center">
    <a href="{{route('user.changepassword.view')}}"><h5 class="btn btn-primary action-btn " style="float: left;">Change Password</h5></a>
    <h5 class="mb-0 h6 btn btn-primary action-btn ">Exam registration form</h5>
   <a href="{{route('userlogout')}}"><h5 class="btn btn-primary action-btn " style="float: right;">Logout</h5></a>
</div> --}}

    <form class="form form-horizontal mar-top" action="{{route('store')}}" method="POST" enctype="multipart/form-data" id="choice_form" >
        @csrf
        <div class="row gutters-5">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Student Details
                        </h5>
                    </div>


                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label for="name">
                                    Select a photo
                                </label>
                                <br>

                            <label for="changeprofilepic" class="custom-file-upload">
                                <div class="form-group row">
                                    <img src="" id="target" style="width:200px;height:auto;display:none; border-radius:10px; margin-buttom:10px;"><br>
                                    <div class="input-group" data-toggle="aizuploader">

                                        <div class="input-group-prepend">
                                            <br>
                                            <div for="imageselect" class="input-group-text bg-soft-secondary font-weight-medium " >Browse</div>
                                        </div>
                                        <div id="showimagename" for="imageselect" class="form-control ">Choose File  </div>

                                    </div>
                                </div>
                            </label>
                            <br>
                            <label style="color:#04AA6D; font-size:12px;">
                                (please choose a passport size photo)
                            </label>
                            <input id="changeprofilepic" name="formimage" type="file" accept=".jpg, .png, .jpeg" value="{{old('formimage')}}" style="display:none;" onchange="showimage()" onclick="showimage()"  required/>
                            <p style="color: red; margin-top:0px;">@error('formimage') {{ $message }} @enderror  </p>


                        </div>
                        </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                Name
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name"  value="{{$data->name}}" readonly>
                            <p style="color: red; margin-top:0px;">@error('name') {{ $message }} @enderror</p>
                        </div>
                        <div class="form-group mb-3">
                            <label for="registration number">
                                University Registration number
                            </label>
                            <input type="text" name="registration_no" class="form-control" placeholder="Eg: 2019-1-10-0123" value="{{$data->registration_number}}"  readonly>
                            <p style="color: red; margin-top:0px;">@error('registration_no') {{ $message }} @enderror</p>
                        </div>


                        <div class="form-group mb-3">
                            <label for="program">
                                Program
                            </label>
                            <input type="text" value="{{$myprogram}}" class="form-control"  readonly>
                            <div style="display: none;">
                            <select name="program" id="program" class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" data-placeholder="Choose Attributes" onchange="getSubject()" >
                                <option value=""> Select Program</option>
                                @foreach ($programs as $program)
                                <option value="{{$program->id}}" @if($myprogram==$program->program) selected @endif > {{$program->program}}</option>
                                @endforeach
                            </select>
                            </div>
                            <p style="color: red; margin-top:0px;">@error('program') {{ $message }} @enderror</p>

                        </div>


                        <div class="form-group mb-3">
                            <label for="program">
                                Level
                            </label>
                            {{-- <input type="text" value="{{$semester}}" class="form-control"  readonly> --}}

                                <select id="level" name="level" class="form-control form-control aiz-selectpicker" onchange="selectexamrollno(); getSubject()" data-live-search="true" >

                                    @foreach ($levels as $level)
                                    <option value="{{$level->id}}" @if($level->level==$semester) selected @endif> {{$level->level}}</option>

                                    @endforeach
                                </select>



                            <p style="color: red; margin-top:0px;">@error('level') {{ $message }} @enderror</p>

                        </div>


                        <div class="form-group mb-3">

                            @foreach ($levels as $level)

                        @if ($level->level == "first semester")

                        <input type="hidden" id="firestsemid" value="{{$level->id}}">

                        @endif

                        @endforeach

                        </div>


                        <div class="form-group mb-3" id="examrollno" style="display:none">
                            <label for="examrollno">
                                Exam Roll Number
                            </label>
                            <input type="text" id="examrollnoinput" name="examrollno" class="form-control" placeholder="Eg: 18120050" value="{{old('examrollno')}}" autofocus required>
                            <p style="color: red; margin-top:0px;">@error('examrollno') {{ $message }} @enderror</p>
                        </div>

                        <div class="form-group mb-3" >
                            <label for="year">
                               Semester
                            </label>
                            <input type="text" value="{{$spring_fall->value}}" class="form-control" readonly>
                            <div style="display:none">
                            <select class="form-control" name="year" >

                                    <option value="Spring" @if($spring_fall->value=="spring") selected @endif>Spring</option>
                                    <option value="Fall" @if($spring_fall->value=="fall") selected @endif>Fall</option>
                            </select>
                            </div>
                            <p style="color: red; margin-top:0px;">@error('year') {{ $message }} @enderror</p>
                        </div>



                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label for="name">
                                    Signature
                                </label>
                                <br>

                            <label for="signatureimage" class="custom-file-upload">
                                <div class="form-group row">
                                    <img src="" id="targetsignature" style="width:200px;height:auto;display:none; border-radius:10px; margin-buttom:10px;"><br>
                                    <div class="input-group" data-toggle="aizuploader">

                                        <div class="input-group-prepend">
                                            <br>
                                            <div for="signatureselect" class="input-group-text bg-soft-secondary font-weight-medium " >Browse</div>
                                        </div>
                                        <div id="showimagename" for="signatureselect" class="form-control ">Choose File  </div>

                                    </div>
                                </div>
                            </label>
                            <br>
                            <label style="color:#04AA6D; font-size:12px;">
                                (please upload a signature or draw signature in signature pad below)
                            </label>
                            <input id="signatureimage" name="signatureimage" type="file" accept=".jpg, .png, .jpeg" value="{{old('signatureimage')}}" style="display:none;" onchange="showsignatureimage()" onclick="showsignatureimage()" />
                            <p style="color: red; margin-top:0px;">@error('signatureimage') {{ $message }} @enderror  </p>


                        </div>
                        </div>


                        <!-- signature -->
                        <div class="form-group mb-3" >
                            <a class="button-text" id="clear_button">CLEAR</a>
                            <div class="signature-pad-container">

                                <canvas id="signature_pad" ></canvas>
                            </div>
                            <input type="hidden" id="signature" name="signature">

                         </div>
                         <p style="color: red; margin-top:0px;">@error('signature') {{ $message }} @enderror</p>
                         <div>
                            <div id="captureimageresults"></div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-lg-8">


                @include('partials.flash')
              <div id="subject-content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Regular Subject
                        </h5>

                    </div>


                            <div class="card-body">
                                <h6 class="alert alert-success alert-dismissible">you can fill the barrier subject as a regular subject (if you are failed in that subject) <br>
                                if you are passover student you can add the back subject of 24 credit ! </h6>
                            </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Back Subject
                        </h5>
                    </div>


                            <div class="card-body">
                                <h6 class="alert alert-success alert-dismissible">You must check concurrent subject and add it ( if you are failed in that subject),<br>
                                you can add 3 back subject for semester (1-6), <br>
                                you can add 4 back subject for(7-8)Semester and<br>
                                you can add 24 credit subject for passover student !</h6>
                                @include('partials.flash')
                            </div>
                </div>

                </div>


            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" id="formsubmitbutton" name="button" value="publish" class="btn btn-success action-btn"  style="display:none;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<div class="col-12">
    <div class="btn-toolbar float-right mb-3"  style="padding-right: 20px; padding-bottom:30px; margin-top:-30px;">
        <button class="btn btn-success " onclick="showsubmitalert()">Submit</button>
    </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js" integrity="sha256-W+ivNvVjmQX6FTlF0S+SCDMjAuTVNKzH16+kQvRWcTg=" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/vendors.js')}}"></script>
<script src="{{ asset('frontend/js/core.js')}}"></script>
<script src="{{ asset('js/sign.js')}}"></script>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>



{{-- <button type="button" onclick="webcam()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>

                        <div class="col-md-12 text-center">
                            <br/>
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <script language="JavaScript">
                function webcam(){
                Webcam.set({
                    width: 490,
                    height: 350,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });

                Webcam.attach( '#my_camera' );


            }
            function take_snapshot() {
                    Webcam.snap( function(data_uri) {
                        $(".image-tag").val(data_uri);
                        document.getElementById('captureimageresults').innerHTML = '<img src="'+data_uri+'" style="width:200px;height:200px;"/>';
                    } );
                }
            </script>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>






    </body>
</html>






<script>
     var signaturePad;
            jQuery(document).ready(function () {
                var signaturePadCanvas = document.querySelector('#signature_pad');

                signaturePadCanvas.setAttribute("width", 'auto');
                signaturePad = new SignaturePad(signaturePadCanvas);
            });

  function selectexamrollno(){
    var levelid = document.getElementById('firestsemid').value;

    var levelselect = document.getElementById('level').value;
    if((levelid != levelselect)&&(levelselect!="")){

        document.getElementById('examrollno').style.display="block";

        const input = document.getElementById('examrollnoinput');

// ✅ Set required attribute
input.setAttribute('required', '');

// ✅ Remove required attribute
// input.removeAttribute('required');
    }
    else{
        document.getElementById('examrollno').style.display="none";
        //  document.getElementById('examrollno').style.display="block";

        const input = document.getElementById('examrollnoinput');


// ✅ Set required attribute
// input.setAttribute('required', '');

// ✅ Remove required attribute
input.removeAttribute('required','');

    }
  }
  selectexamrollno();


  function getSubject(){

    var programid = document.getElementById('program').value;
    var levelid = document.getElementById('level').value;

    if(((programid.length)>0)&&((levelid.length)>0)){
        $.post('{{ route('getsubject') }}', {_token:'{{ csrf_token() }}',  programid:programid , levelid:levelid}, function(data)
               {
                console.log(data);
                if(data == 1){
                  $('#subject-content').html('Sorry, Something get error please try again');

                }
                else{

                        $('#subject-content').html(data);


                }
            });
    }
  }
  getSubject();






function showimage(){
    var src = document.getElementById("changeprofilepic");
    var target = document.getElementById("target");
    if(src.value != ""){
        target.style.display = "block";
    }

    var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };

    fr.readAsDataURL(src.files[0]);

}


function showsignatureimage(){
    var src = document.getElementById("signatureimage");
    var target = document.getElementById("targetsignature");
    if(src.value != ""){
        target.style.display = "block";
    }

    var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };

    fr.readAsDataURL(src.files[0]);

}

showimage();

 function showsubmitalert(){

Swal.fire({
  title: 'are you sure to confirm ? Please check again to make sure. you cannot edit after submit the form !',
  showCancelButton: true,
  confirmButtonText: 'Yes submit',
  cancelButtonText: `No cancel`,
  icon:'question',
}).then((result) => {

  if (result.isConfirmed) {

    if (signaturePad.isEmpty()) {
        const input = document.getElementById('signatureimage');

// ✅ Set required attribute
input.setAttribute('required', '');

// ✅ Remove required attribute
// input.removeAttribute('required');


                }else{
                    showsignature();
                    const input = document.getElementById('signatureimage');

// ✅ Set required attribute
input.removeAttribute('required','');

signaturePad = null;
                }


                const input = document.getElementById('signatureimage');

// ✅ Set required attribute
// input.setAttribute('required', '');

// ✅ Remove required attribute


    var level = document.getElementById("level").value;
    var table = document.getElementById('backtable').rows.length;
	// var rowCount = table.rows.length;
    var backsub = "";


     for(k=1;k < table;k++){
        backsub = backsub+","+document.getElementById('concurrent'+k).value;
     }

     $.post('{{ route('checksubmitcredit') }}', {_token:'{{ csrf_token() }}',  level:level , backsub:backsub , tablerow:table}, function(data)
             {



            if(data == '1'){
                document.getElementById("formsubmitbutton").click();
               }
               else{
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data,
                footer: ''
                });

                return false;
               }
           });
        }
        else{
            return false;
        }
        });
        // return false;





 }



 function profileToggle() {

var profileDropdown = document.getElementById('ProfileDropDown').style;
if (profileDropdown.display == "none") {
    profileDropdown.display = "block";
} else {
    profileDropdown.display = "none";
}
}
profileToggle();


        </script>






<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
