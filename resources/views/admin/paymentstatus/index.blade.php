<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.app')

@section('style')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 21px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


        /* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10000; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal1 Content */
.modal1-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}


.modal1-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal1-body {padding: 2px 16px;}

.modal1-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}



  /* The Modal (background) */
  .modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal2 Content */
.modal2-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal2-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal2-body {padding: 2px 16px;}

.modal2-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
    </style>
@endsection

@section('content')

    <!--Grid Form-->

    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                <nav class="navbar navbar-dark bg-dark">
                    {{-- <button class="navbar-toggler" type="button" onclick="openmenu()">
                      <span class="navbar-toggler-icon"></span>
                    </button> --}}
                    <div></div>
                    <div style="float: right; display:inline-flex">
                        <input type="text" id="search" name="search"
                            style=" border-radius: 20px; box-shadow: 2px 2px #888888; padding:5px;" placeholder="Search ..."
                            onkeyup="search()" onkeydown="search()" onclick="search()" onchange="search()">

                    </div>


                  </nav>
                  <div>
                    @php
                    $errors = Session::get('error');
                    $messages = Session::get('success');

                    @endphp
                    @if ($errors)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>Error!</strong> {{ $errors }}
                    </div>
                     @endif

                    @if ($messages)
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>Success!</strong> {{ $messages }}
                    </div>
                     @endif




                    </div>
                  <div id="myModal2" class="modal2">

                    <!-- Modal1 content -->
                    <div class="modal2-content">
                      <div class="modal2-header">
                        <span class="close close2">&times;</span>
                        <h2 >
                            <br>
                        </h2>
                      </div>

                      <div class="modal2-body">

                        <div style="padding-left:10px;">
                            <li>
                            <button id="filebutton" onclick="selectexcel()" style="margin: 5px;"
                                class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded">Import
                                Excel <i class="fas fa-upload"></i></button>
                            </li>
                            <li>

                            <button id="filebutton" onclick="bulkupdate()" style="margin: 5px;"
                                class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded"
                                >Reset for new semester</button>
                                <input type="file" name="file" id="file" style="display:none;" onchange="submitexcel();">
                            </li>
                            <li>
                                <button id="filebutton" onclick="openclose()" style="margin: 5px;"
                                class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded"
                                >@if($open->value == "0") Open form for new semester @else Close form for this semester @endif </button>
                            </li>

                        </div>
                        <br>

                      </div>
                      <div class="modal1-footer">
                        <h3></h3>
                      </div>
                    </div>

                  </div>



            </div>

            <div class="p-3">

                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/4 px-4 py-2">Student Name</th>
                            <th class="border w-1/7 px-4 py-2">Payment Approvel</th>
                            @if(session()->get('testadminlogin') == "yes")
                            <th class="border w-1/5 px-4 py-2">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td class="border px-4 py-2">{{ $payment->name }} {{ $payment->roll_no }}</td>



                                <td class="border px-4 py-2">
                                    @if(session()->get('testexamlogin') == "yes")
                                    <label class="switch">


                                        <input type="checkbox" @if ($payment->approve_form == 1) checked @endif
                                            onchange="changeformstatus(this)" value="{{ $payment->id }}" readonly>
                                        <span class="slider round"></span>
                                    </label>
                                    @endif
                                    @if(session()->get('testadminlogin') == "yes")
                                    <label class="switch">


                                        @if($payment->approve_form == 1)
                                        <i class="fas fa-check text-green-500 mx-2"></i>
                                        @else
                                        <i class="fas fa-times text-red-500 mx-2"></i>
                                        @endif
                                    @endif
                                </td>
                                @if(session()->get('testadminlogin') == "yes")
                                <td class="border px-4 py-2">

                                  <a onclick="editdata('{{ $payment->id }}','{{$payment->name}}','{{$payment->registration_number}}','{{ $payment->roll_no }}','{{ $payment->email }}')">  <i class="fas fa-edit"></i></a>
                                </td>
                                @endif


                            </tr>
                        @endforeach



                    </tbody>
                </table>
                <div id="myModal1" class="modal1">

                    <!-- Modal1 content -->
                    <div class="modal1-content">
                      <div class="modal1-header">
                        <span class="close close1">&times;</span>
                        <h2 id="modelheader">Edit data</h2>
                      </div>

                      <div class="modal1-body">
                        <form method="POST" action="{{route('admin.paymentstatus.update')}}">
                            @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Name</label><br>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Roll number</label><br>
                                <input type="text" class="form-control" name="roll_no" id="roll_no">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Registration number</label><br>
                                <input type="text" class="form-control" name="registration_number" id="registration_number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label><br>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 center" style="text-align: center">
                                <input type="submit" class="btn btn-primary"  value="update data">
                            </div>
                        </div>
                        </form>

                      </div>
                      <div class="modal1-footer">
                        <h3></h3>
                      </div>
                    </div>

                  </div>





            </div>
        </div>
    </div>
    <!--/Grid Form-->

<br>
    <div class="pagination-wrapper centred">
        <div class="d-flex justify-content-center">
            {{ $payments->links() }}<br>
        </div>
    </div>
<br><br>

    <script>
        // document.querySelector(".first").addEventListener('click', function(){

        // });

        // document.querySelector(".second").addEventListener('click', function(){
        //   toastMixin.fire({
        //     animation: true,
        //     title: 'Signed in Successfully'
        //   });
        // });

        // document.querySelector(".third").addEventListener('click', function(){
        //   toastMixin.fire({
        //     title: 'Wrong Password',
        //     icon: 'error'
        //   });
        // });
    </script>
@endsection
<script>
    function selectexcel() {
        $('#file').click();

    };



    function bulkupdate() {

        Swal.fire({
    title: 'are you sure to update ?',
    icon:'question',
    showCancelButton: true,
    confirmButtonText: 'Yes, update ',
    cancelButtonText: `No, cancel`,
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        // Swal.fire('Saved!', '', 'success')




        // if (confirm('are you sure to update ?')) {
            $.get('{{ route('updatepaymentstatus') }}', {
                _token: '{{ csrf_token() }}',
            }, function(data) {
                console.log(data);
                if (data == 1) {

                    Swal.fire({
                    title: 'update successfully !',

                    confirmButtonText: 'Ok',
                    }).then((result) => {

                    if (result.isConfirmed) {

                      location.reload();
                    }

                    });
                } else {
                    // alert('somrthing wrong please try again');
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'something wrong please try again !',

                    })
                }
            });
        }

    })
    }



    function openclose() {

Swal.fire({
title: 'are you sure to update ?',
icon:'question',
showCancelButton: true,
confirmButtonText: 'Yes, update ',
cancelButtonText: `No, cancel`,
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {
// Swal.fire('Saved!', '', 'success')




// if (confirm('are you sure to update ?')) {
    $.get('{{ route('open.close.form') }}', {
        _token: '{{ csrf_token() }}',
    }, function(data) {
        console.log(data);
        if (data == 1) {

            Swal.fire({
            title: 'update successfully !',

            confirmButtonText: 'Ok',
            }).then((result) => {

            if (result.isConfirmed) {

              location.reload();
            }

            });
        } else {
            // alert('somrthing wrong please try again');
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'something wrong please try again !',

            })
        }
    });
}

})
}



    function submitexcel() {
        var uploadFile = document.getElementById("file");
        if ("" == uploadFile.value) {


        } else {

            Swal.fire({
    title: 'are you sure to update ?',
    showCancelButton: true,
    confirmButtonText: 'Yes, update ',
    cancelButtonText: `No, cancel`,
    icon:'warning',
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        // Swal.fire('Saved!', '', 'success')



            var fd = new FormData();

            fd.append("fileInput", $("#file")[0].files[0]);



            // fd.append('file',files[0]);

            $.ajax({
                url: "{{ route('upload.paymentstatus') }}",
                data: fd,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data == 1) {

                        Swal.fire({
                    title: 'File import successfully',
                    confirmButtonText: 'ok',
                    icon:'success',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                    }
                },
                error: function(err) {
                    Swal.fire({
                    title: 'Faild to import file,please check if the multiple data of some field are empty !',
                    confirmButtonText: 'ok',
                    icon:'error',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        document.getElementById("file").value ="";

                    }
                });
                }
            });
        }
    });

        }
    }




    $(document).ready(function() {



        $('#search').on('keyup', function() {

            search();
        });

        $('#search').on('focus', function() {
            search();

        });
    });

    function search() {


        // var searchKey = $('#search').val();
        var searchKey = document.getElementById('search').value;

        var modal = document.getElementById("myModal");

        if (searchKey.length > 2) {
            // Get the modal


            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close00")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
            modal.style.display = "block";

            $.post('{{ route('searchajax') }}', {
                _token: '{{ csrf_token() }}',
                search: searchKey
            }, function(data) {
                console.log(data);
                if (data == 1) {
                    $('#search-content').html('Sorry, nothing found for Roll No : <b>"' + searchKey + '"</b>');

                } else {
                    $('#search-content').html(data);
                }
            });
        } else {

            modal.style.display = "none";


        }

    }

    $(document).ready(function() {
        var modal = document.getElementById("myModal00");
        window.onclick = function(event) {
            modal.style.display = "none";
        }
    });



    function changeformstatus(event) {


        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        var rollno = event.value;
        $.post('{{ route('changepaymentformstatus') }}', {
            _token: '{{ csrf_token() }}',
            rollno: rollno
        }, function(data) {
            console.log(data);
            if (data == 1) {

                toastMixin.fire({
                    animation: true,
                    position: 'bottom-left',
                    title: '  status has been updated successfully !',
                    icon: 'success'
                });

            } else {
                toastMixin.fire({
                    animation: true,
                    position: 'bottom-left',
                    title: 'Something wrong please try again !',
                    icon: 'error'
                });
            }
        });
    }





    function editdata(id,name,registration_number,roll_no,email){
        document.getElementById('id').value=id;
        document.getElementById('roll_no').value=roll_no;
        document.getElementById('email').value=email;
        document.getElementById('name').value=name;
        document.getElementById('modelheader').innerHTML=name;
        document.getElementById('registration_number').value=registration_number;
        var modal = document.getElementById("myModal1");


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close1")[0];

        // When the user clicks the button, open the modal

        modal.style.display = "block";


        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }


    }
</script>



<script>
    function openmenu(){
    // Get the modal
    var modal = document.getElementById("myModal2");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];


      modal.style.display = "block";


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
}


    </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('script')
@endsection
