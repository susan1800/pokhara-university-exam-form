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

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
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



  /* The Modal (background) */
  .modal3 {
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

/* Modal3 Content */
.modal3-content {
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


.modal3-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal3-body {padding: 2px 16px;}

.modal3-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
    </style>
@endsection
@section('content')
@include('admin.partials.flash')

                     <!--Grid Form-->

                     <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <nav class="navbar navbar-dark bg-dark">
                                <div class="btn btn-primary" style="color:white;" onclick="openmenu()">Print Admit Card</div>

                                <div style="float: right; display:inline-flex">
                                    <input type="search" onclick="search()" onkeyup="search()" onkeydown="search()" id="search" name="search" style=" border-radius: 20px; box-shadow: 2px 2px #888888; padding:5px;" placeholder="Search ...">

                                </div>

                              </nav>
                              <div id="myModal2" class="modal2">

                                <!-- Modal1 content -->
                                <div class="modal2-content">
                                  <div class="modal2-header">
                                    <h2 >
                                        Print Admit Card

                                    <span class="close close2" style="float:right;">&times;</span>
                                </h2>

                                  </div>

                                  <div class="modal2-body">

                                    <div style="padding:10px;">
                                        <p>Print Admit Card</p>
                                        <div class="p-3">
                                            <table class="table-responsive w-full rounded">
                                                <thead>
                                                  <tr>
                                                    <th class="border w-1/4 px-4 py-2">Semester</th>
                                                    <th class="border w-1/4 px-4 py-2">Action</th>
                                                  </tr>
                                                  <tr>
                                                    <td class="border px-4 py-2">Print All Admit card</td>
                                                    {{-- href="{{route('printdata','all')}}" --}}
                                                    <td class="border px-4 py-2"><a  target="blank"  href="{{route('printdata','all')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="border px-4 py-2">Print First year admit card</td>
                                                    <td class="border px-4 py-2"><a  target="blank" href="{{route('printdata','first_year')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="border px-4 py-2">Print Second year admit card</td>
                                                    <td class="border px-4 py-2"><a  target="blank" href="{{route('printdata','second_year')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="border px-4 py-2">Print Third year admit card</td>
                                                    <td class="border px-4 py-2"><a  target="blank" href="{{route('printdata','third_year')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="border px-4 py-2">Print Forth year admit card</td>
                                                    <td class="border px-4 py-2"><a  target="blank" href="{{route('printdata','forth_year')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="border px-4 py-2">Print Fifth year admit card (Architecture)</td>
                                                    <td class="border px-4 py-2"><a  target="blank" href="{{route('printdata','fifth_year')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>

                                                  <tr>
                                                    <td class="border px-4 py-2">Print passover student admit card</td>
                                                    <td class="border px-4 py-2"><a  target="blank" href="{{route('printdata','passover')}}" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                                                  </tr>

                                                </thead>
                                            </table>
                                        </div>
                                        {{-- <a class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded" href="">Print Admit card  <i class="fas fa-print"></i></a><br> --}}
                                    </div>
                                  </div>
                                </div>
                              </div>


                                    <br>

                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>

                                        <th class="border w-1/4 px-4 py-2">Student Name</th>
                                        <th class="border w-1/6 px-4 py-2">College roll no</th>
                                        <th class="border w-1/6 px-4 py-2">Form Fee Status</th>
                                        <th class="border w-1/6 px-4 py-2">Approve Form</th>
                                        <th class="border w-1/4 px-4 py-2">Image</th>
                                        <th class="border w-1/5 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($formDatas as $formdata)

                                        <tr>
                                            <td class="border px-4 py-2" style=" ">{{$formdata->userdetail->name}} @if($formdata->seen == 0)<p style="font-size:12px; padding-left:10px; padding-right:10px; padding-top:2px; padding-bottom:2px; margin-left:10px; color:white; background:#de7207; width:50px; border-radius:4px; display:inline-flex;">New</p>@endif</td>
                                            <td class="border px-4 py-2">{{$formdata->userdetail->roll_no}}</td>
                                            <td class="border px-4 py-2">
                                              @if ($formdata->payment == 1)
                                              <i class="fas fa-check text-green-500 mx-2"></i>
                                              @else
                                              <i class="fas fa-times text-red-500 mx-2"></i>
                                              @endif
                                              <label class="switch" style="float: right;">
                                                <input type="checkbox" @if ($formdata->payment == 1)
                                                  checked

                                                @endif value="{{$formdata->id}}" onchange="changeformpaymentstatus(this)" >
                                                <span class="slider round"></span>
                                              </label>

                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" @if ($formdata->approve == 1)
                                                      checked

                                                    @endif value="{{$formdata->id}}" onchange="changeformstatus(this)" >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2"><img src ="{{asset('storage/'.$formdata->image)}}" style="height:100px;"></td>
                                            <td class="border px-4 py-2">
                                                <a href="{{route('view.studentdata' , $formdata->id)}}" target="blank"  class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" style="padding:10px !important;">
                                                        <i class="fas fa-eye"></i></a><br><br><br>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="{{route('editdata',$formdata->id)}}" style="padding:10px !important;">

                                                        <i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>



                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->

<br>
                    <div class="pagination-wrapper centred">
                        <div class="d-flex justify-content-center">
                            {{ $formDatas->links() }}<br>
                        </div>
                    </div>
                    <br><br>


@endsection


<script>


$(document).ready(function() {


$('#search').on('keyup', function(){

            search();
        });

        $('#search').on('focus', function(){
            search();

        });
      });

        function search(){


            // var searchKey = $('#search').val();
            var searchKey = document.getElementById('search').value;

            var modal = document.getElementById("myModal");

            if(searchKey.length > 2){
                // Get the modal


                  // Get the <span> element that closes the modal
                  var span = document.getElementsByClassName("close00")[0];

                  // When the user clicks on <span> (x), close the modal
                  span.onclick = function() {
                    modal.style.display = "none";
                  }
                  modal.style.display = "block";

                  $.post('{{ route('searchajaxform') }}', {_token:'{{ csrf_token() }}',  search:searchKey}, function(data)
                {
                  console.log(data);
                  if(data == 1){
                    $('#search-content').html('Sorry, nothing found for Roll No : <b>"'+searchKey+'"</b>');

                  }
                  else{
                    $('#search-content').html(data);
                  }
              });
            }
            else {

              modal.style.display = "none";


            }

        }

    $(document).ready(function() {
     var modal = document.getElementById("myModal00");
     window.onclick = function(event) {
        modal.style.display = "none";
    }
});





  function changeformstatus(event){

   var toastMixin = Swal.mixin({
     toast: true,
     icon: 'success',
     title: 'General Title',
     animation: false,
     position: 'top-left',
     showConfirmButton: false,
     timer: 5000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
   });

   var rollno = event.value;
   $.post('{{ route('changeapproveformstatus') }}', {_token:'{{ csrf_token() }}',  rollno:rollno}, function(data)
                 {
                   console.log(data);

                   if(data == 1){

                     toastMixin.fire({
                       animation: true,
                       position: 'bottom-left',
                       title: '  status has been updated successfully !',
                       icon: 'success'
                     });

                   }
                   else{
                     toastMixin.fire({
                       animation: true,
                       position: 'bottom-left',
                       title: 'Form already accepted  !',
                       icon: 'error'
                     });
                   }
               });
  }




  function changeformpaymentstatus(event){

   var toastMixin = Swal.mixin({
     toast: true,
     icon: 'success',
     title: 'General Title',
     animation: false,
     position: 'top-left',
     showConfirmButton: false,
     timer: 5000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
   });

   var rollno = event.value;
   $.post('{{ route('changeformpaymentstatus') }}', {_token:'{{ csrf_token() }}',  rollno:rollno}, function(data)
                 {
                   console.log(data);
                   if(data == 1){

                     toastMixin.fire({
                       animation: true,
                       position: 'bottom-left',
                       title: '  status has been updated successfully !',
                       icon: 'success'
                     });
                     location.reload();

                   }
                   else{
                     toastMixin.fire({
                       animation: true,
                       position: 'bottom-left',
                       title: 'Form already accepted  !',
                       icon: 'error'
                     });
                   }
               });
  }





  function deletealldata(){
    Swal.fire({
  title: 'Do you want to Reset data?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Reset data',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    // Swal.fire('Saved!', '', 'success');
    $.get('{{ route('deletefoemdata') }}', {_token:'{{ csrf_token() }}'}, function(data)
                 {
                   console.log(data);
                   if(data == 1){

                     swal.fire({
                       position: 'bottom-left',
                       title: ' Data Reset successfully !',
                       icon: 'success',
                     });
                     location.reload();

                   }
                   else{
                     swal.fire({
                       position: 'bottom-left',
                       title: 'Something wrong please try again  !',
                       icon: 'error',
                     });
                     alert(data)
                    //  location.reload();

                   }
               });

  }
})
  }


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

function openedit(){
    // Get the modal
    var modal = document.getElementById("myModal3");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close3")[0];


      modal.style.display = "block";


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
}
openedit();










  </script>



  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('script')


@endsection


