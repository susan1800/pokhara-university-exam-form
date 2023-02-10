
@extends('admin.app')

@section('style')
<link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/core.css') }}">
<link rel="stylesheet" href="{{ asset('css/sign.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        .mousefocus:hover{
            cursor: pointer;
        }
    </style>
    @endsection
    @section('content')
<form>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">
                Student Data
            </h5>


        </div>
        <div class="card-body flex" >
            <div class="form-group mb-3" style="margin:3px; width:45%; ">
            <label for="name">
                Name
            </label>
            <input type="text" name="name" class="form-control md6" placeholder="Full Name"  value="{{$formdata->userdetail->name}}" readonly>
        </div>

        <div class="form-group mb-3" style="margin:3px; width:45%;">
            <label for="name">
                Exam roll number
            </label>
            <input type="text" name="name" class="form-control md6" placeholder="Exam roll no"  value="{{$formdata->exam_roll_no}}" readonly>
        </div>
        </div>
        <div class="card-body flex" >
        <div class="form-group mb-3" style="margin:3px; width:45%;">
            <label for="name">
                college roll number
            </label>
            <input type="text" name="name" class="form-control md6" placeholder="college roll no"  value="{{$formdata->college_roll_no}}" readonly>
        </div>
        <div class="form-group mb-3" style="margin:3px; width:45%;">
            <label for="name">
                registration number
            </label>
            <input type="text" name="name" class="form-control md6" placeholder="registration number"  value="{{$formdata->userdetail->registration_number}}" readonly>
        </div>
    </div>
    <div class="card-body flex" >
        <div class="form-group mb-3" style="margin:3px; width:45%;">
            <label for="name">
                Semester
            </label>
            <input type="text" name="name" class="form-control md6" placeholder="Semester"  value="{{$formdata->level->level}}" readonly>
        </div>
        <div class="form-group mb-3" style="margin:3px; width:45%;">
            <label for="name">
                Program
            </label>
            <input type="text" name="name" class="form-control md6" placeholder="Program"  value="{{$formdata->program->program}}" readonly>
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">
                Regular Subject
            </h5>

        </div>


                <div class="card-body">
                    <table border="1" style="width:100%;">
                    <tr>
                        <th>SN</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                    </tr>
                    @php
                        $i=1;
                    @endphp

                    @foreach ($regulardatas as $regular)
                    @php

                            $subject = App\Models\Subject::where('id' , $regular)->where('newbatch' , $newbatch)->first();


                    @endphp
                    <tr id="">
                        <th><p>{{$i}}</p></th>

                            @if (!empty($subject->barrier_id))

                            @php

                            $barrier = App\Models\Subject::where('id' , $subject->barrier_id)->where('newbatch' , $newbatch)->first();


                            @endphp
                            <th>
                                <select class="form-control" onchange='selectbarrier("{{$form_id}}","{{$subject->subject_code}}","{{$barrier->subject_code}}")' id="getregularorbarrier">

                                    <option value="{{$subject->subject_code}}" selected>{{$subject->subject}}</option>
                                    <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>

                                </select>
                            </th>
                                <th id="regularorbarriercode">{{$subject->subject_code}}</th>


                            @elseif (!empty($subject->is_barrier))

                            @php

                            $barrier = App\Models\Subject::where('id' , $subject->is_barrier)->where('newbatch' , $newbatch)->first();


                            @endphp
                            <th>
                                <select class="form-control" onchange='selectbarrier("{{$form_id}}","{{$subject->subject_code}}","{{$barrier->subject_code}}")' id="getregularorbarrier">

                                    <option value="{{$subject->subject_code}}" selected>{{$subject->subject}}</option>
                                    <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>

                                </select>
                            </th>


                            <th id="regularorbarriercode">{{$subject->subject_code}}</th>
                            @else
                            <th>{{$subject->subject}}</th>
                                <th>{{$subject->subject_code}}</th>
                            @endif


                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                    </table>
                </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">
                Back Subject
            </h5>
                <div style="text-align: right; display:inline-flex">


                     <select class="form-control" id="addbacksubject">
                        <option value="">Add back subject</option>
                        @foreach ($allsubjects as $allsubject)
                        <option value="{{$allsubject->id}}">{{$allsubject->subject}}</option>

                        @endforeach
                     </select>
                     @foreach ($allsubjects as $allsubject)

                      @endforeach
                    <h1 class="mousefocus" onclick='addbackrow("{{$form_id}}")'>&#10146;</h1>
                </div>

        </div>

                <div class="card-body" id="backsubjectbody">
                    <table border="1" style="width:100%;" id="backtable">
                        <tr>

                            <th>Subject</th>
                            <th>Subject Code</th>
                            <th>Remarks</th>
                            <th>Option</th>
                        </tr>
                        @php
                            $i=1;
                        @endphp

                        @foreach ($backdatas as $back)

                        @php

                            $concurrentsubject = App\Models\Subject::where('id' , $back)->where('newbatch' , $newbatch)->first();


                            @endphp


                        <tr style="padding:5px;" name="{{$concurrentsubject->id}}">
                            <th>

                               {{$concurrentsubject->subject}}
                            </th>
                            <th>{{$concurrentsubject->subject_code}}
                            </th>
                            <td>Back Subject (Remove if you dont have back in this subject)</td>
                            <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeRow('{{$form_id}}','{{$concurrentsubject->id}}')">&#10008;</p></th>
                        </tr>



                        @endforeach
                        </table>
                </div>
    </div>

@endsection




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>

    <script>


    function selectbarrier(form_id,subject1_code,subject2_code){

            var code = document.getElementById('getregularorbarrier').value;
        if(code == subject1_code){
            subject = subject2_code;
        }else{
            subject = subject1_code;
        }
        // alert(code+subject);



            document.getElementById('regularorbarriercode').innerHTML=code;


            $.post('{{ route('admin.changebarrier') }}',
            {
                _token:'{{ csrf_token() }}',
                change_barrier:code ,
                form_id:form_id ,
                subject:subject,

            }, function(data)
                    {
                     if(data==1){
                        Swal.fire({
                    title: 'Data changed',
                    confirmButtonText: 'ok',
                    icon:'success',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                     }
                     else{
                        Swal.fire({
                        icon: 'error',
                        title: '',
                        text: 'Something wrong please try again',
                        footer: '',
                        });
                        location.reload();
                     }

                  });

        }






            function removeRow(form_id ,id) {

                Swal.fire({
                    title: 'Do you sure to remove this subject ?',
                    confirmButtonText: 'yes',
                    showCloseButton: true,
                    showCancelButton: true,
                    icon:'question',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {





            $.post('{{ route('admin.removeback') }}',
            {
                _token:'{{ csrf_token() }}',
                form_id:form_id ,
                id:id,

            }, function(data)
                    {
                     if(data==1){
                        Swal.fire({
                    title: 'Data changed',
                    confirmButtonText: 'ok',
                    icon:'success',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                     }
                     else{
                        Swal.fire({
                        icon: 'error',
                        title: '',
                        text: 'Something wrong please try again',
                        footer: '',
                        });
                        location.reload();
                     }

                  });






                    }
                });
    }







        function addbackrow(form_id){


            var id=document.getElementById('addbacksubject').value;

            if(id == "" || id==null){
                Swal.fire({
                        icon: 'info',
                        title: '',
                        text: 'Please select subject first!',
                        footer: '',
                        });
            }

            else{
            $.post('{{ route('admin.addback') }}', {_token:'{{ csrf_token() }}',  id:id , form_id:form_id}, function(data)
                    {

                        if(data==1){
                            Swal.fire({
                        icon: 'Success',
                        title: '',
                        text: 'Subject added successfully !',
                        footer: '',
                        });
                        location.reload();
                        }
                        else{
                            Swal.fire({
                        icon: 'error',
                        title: '',
                        text: 'Something wrong please try again',
                        footer: '',
                        });
                        }

                  });
                }
        }








    </script>

</form>
