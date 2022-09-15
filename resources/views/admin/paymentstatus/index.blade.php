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



    </style>
@endsection

@section('content')
@include('admin.partials.flash')

                     <!--Grid Form-->

                     <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Full Table
                                <div style="padding-left:10px; display:inline-flex">
                                  <button id="filebutton" onclick="selectexcel()" class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded">Import Excel</button>
                                  <input type="file" name="file" id="file" style="display:none;" onchange="submitexcel();">
                                 
                              </div>
                                <div style="float: right; display:inline-flex">
                                    <input type="text" id="search" name="search" style=" border-radius: 20px; box-shadow: 2px 2px #888888; padding:5px;" placeholder="Search ..." onkeyup="search()" onkeydown="search()" onclick="search()" onchange="search()">
                                    
                                </div>
                               
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Student Name</th>
                                        <th class="border w-1/6 px-4 py-2">Fee Status</th>
                                        <th class="border w-1/7 px-4 py-2">Approve Form</th>
                                        {{-- <th class="border w-1/5 px-4 py-2">Actions</th> --}}
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($payments as $payment)
                                        <tr>
                                            <td class="border px-4 py-2">{{$payment->name}} {{$payment->roll_no}}</td>

                                            <td class="border px-4 py-2">
                                              @if ($payment->status == 1)
                                              <i class="fas fa-check text-green-500 mx-2"></i>
                                              @else
                                              <i class="fas fa-times text-red-500 mx-2"></i>
                                              @endif
                                                
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" @if ($payment->approve_form == 1)
                                                    checked
                                                    @endif  onchange="changeformstatus(this)" value="{{$payment->id}}">
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                    

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
 


 function selectexcel(){
    $('#file').click();

};
function submitexcel(){
  var uploadFile = document.getElementById("file");
            if( ""==uploadFile.value){


            }
            else{
                var fd = new FormData();

                fd.append( "fileInput", $("#file")[0].files[0]);
                // fd.append('file',files[0]);

                $.ajax({
                  
                    url: "{{ route('upload.paymentstatus')}}",
                    data: fd,
                    headers: {
                      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }, 
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data){
                        if(data.uploaded==true){
                            alert(data.url);
                        }
                    },
                    error: function(err){
                        alert(err);
                    }
                });

            }
}

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

                  $.post('{{ route('searchajax') }}', {_token:'{{ csrf_token() }}',  search:searchKey}, function(data)
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
  $.post('{{ route('changepaymentformstatus') }}', {_token:'{{ csrf_token() }}',  rollno:rollno}, function(data)
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
                      title: 'Something wrong please try again !',
                      icon: 'error'
                    });
                  }
              });
}

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('script') 

@endsection
