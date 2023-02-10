@extends('admin.app')

@section('style')
@endsection

@section('content')
<div class="p-3">
    <table class="table-responsive w-full rounded">
        <thead>
          <tr>

            <th class="border w-1/4 px-4 py-2"></th>
            <th class="border w-1/6 px-4 py-2">
               Action
            </th>

          </tr>
          <tr>
            <th class="border w-1/4 px-4 py-2">add new student</th>
            <th class="border w-1/6 px-4 py-2"><button class="btn btn-primary" onclick="selectexcel()">Upload excel <i class="fas fa-upload"></i></button>
                <input type="file" name="file" id="file" style="display:none;" onchange="submitexcel();">
            </th>

          </tr>
          <tr>
            <th class="border w-1/4 px-4 py-2">Reset Data for New Semester</th>
            <th class="border w-1/6 px-4 py-2"><button class="btn btn-primary" onclick="ResetData()">Reset Data<i class="fas fa-reload"></i></button></th>
          </tr>
          <tr>
            <th class="border w-1/4 px-4 py-2">@if($open->value == 1)Close Form for this Semester @else Open Form For New Semester @endif </th>
            <th class="border w-1/6 px-4 py-2"><button class="btn btn-primary" onclick="openclose()">@if($open->value == 1)Close @else Open @endif <i class="fas fa-wrong"></i></button></th>
          </tr>
          <tr>

            <th class="border w-1/4 px-4 py-2">Semester</th>
            <th class="border w-1/6 px-4 py-2">
               {{$spring_fall->value}}
            </th>

          </tr>
        </thead>
    </table>
</div>
@endsection



<script>


////////////////////////// Change form Open Or Close /////////////////////
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






///////////////////////////////// Excel update /////////////////



function selectexcel() {
        $('#file').click();

    };


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
                        // location.reload();
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






    /////////////////// Reset For New Semester /////////////////
    function ResetData(){
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


                   }
                   else{
                     swal.fire({
                       position: 'bottom-left',
                       title: 'Something wrong please try again  !',
                       icon: 'error',
                     });
                    //  alert(data);
                    //  location.reload();

                   }
               });

  }
})
  }
    </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
