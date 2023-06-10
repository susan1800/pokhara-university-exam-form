<html>

<head>
    <title>Form</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
            margin-left: 5px;
            margin-right: 10px;
            /*margin-top: 0px;*/
            /* font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; */
        }
        /* Create three equal columns that floats next to each other */

        .column {
            float: left;
            /*width: 33.33%;
    padding: 5px;*/
            height: 150px;
            /*margin-top: 5px;*/
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: small;
            color: rgb(125, 125, 230);
            /*background-color:#bbb; /* Should be removed. Only for demonstration */
        }
        /*Clear floats after the columns */

        .row:after {
            content: "";
            display: table;
            clear: both;
            width: 100%
        }

        .detail:after {
            content: "";
            display: table;
            clear: both;
        }

        .year:after {
            content: "";
            display: table;
            clear: both;
        }

        .signature:after {
            content: "";
            display: table;
            clear: both;
        }

        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }

        .container {
            width: 70%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="page-break-before: always">
        <div class="row">
            <div class="column" style="float: left;margin-left:0.5%; ">
                <img src="{{asset('logo/logo.jpg')}}" alt="POKHARA UNIVERSITY" width="100" height="100">

            </div>
            <div class="column" style="text-align: center; margin-left: 0%; ">
                <h2>POKHARA UNIVERSITY<br>Office of the Controller of Examinations<br> Trimester/Yearly Examination<br>Entrance Card</h2>
            </div>
            <div class="column" style="margin-top:2px; margin-left: 1%;">

                <input type="image" src="{{URL::asset('storage/'.$formdata->image)}}" width="100" height="100" style="object-fit: fill">

            </div>
        </div>
        <form>
            <div class="detail" style="margin-bottom: -15px; margin-top:-10px;">

                <div class="col1" style="float: left;width: 50%; margin-bottom: -7px; margin-top:-15px;">
                    <p>Exam Roll No. : {{$formdata->exam_roll_no}}</p>

                </div>
                <div class="col1" style="float:left; margin-bottom: -7px; margin-top:-15px;">
                    <p>Exam Center : </p>

                </div>
            </div>
            <input type="hidden" id="formid" value="{{$formdata->id}}">
            <div class="name" style="margin-bottom: -7px;">
                <p>P.U Registration No. : {{$formdata->userdetail->registration_number}}</p>
            </div>
            <div class="name" style="margin-bottom: -20px; margin-top:0px;">
                <p>Name of the Student : {{$formdata->userdetail->name}}</p>
            </div>
            <div class="col1" style="float: left;width: 50%; margin-bottom: -20px;">
                <p>Level : Bachelor</p>

            </div>
            <div class="col1" style="float:left; margin-bottom: -20px;">
                <p>Program : {{$formdata->program->program}}</p>

            </div>
            <div class="year" style="display: inlineflex; margin-bottom: -30px;">
                <div class="col1" style="float: left;width: 60%; clear: both; margin-bottom: -20px;">
                <p>Semester/Trimester/Year : {{$formdata->level->level}}</p>

                </div>
                <div class="col1" style="float:left; margin-bottom: -20px; ">
                    <p>Year : {{$formdata->year}}</p>,

                </div>
            </div>
            <div class="college" style="float:none ;clear: both; marginm:0px;padding: 0px;">
                <p>Name Of the College : Cosmos College of Management and Technology<br><br>For the appearance in the examination of the following courses as per course registered.</p>
                <h3>Regular Courses</h3>
            </div>
            <div class="regular" style=" margin-top:-15px;">
                <table style="width:auto ; text-align: center; width: 100%;">
                    <tr>
                        <th style="width: auto;">S.No.</th>
                        <th style="width: auto;">Course Code</th>
                        <th style="width: auto;">Course Title</th>
                        <th style="width:auto;">Credit</th>
                        <th style="width:auto;">Remarks</th>
                    </tr>
                    @php
                         $i=1;
                    @endphp

                    @foreach ($formdata->subject as $subject)
                    @php
                        $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$regularsubject->subject_code}}</td>
                        <td>{{$regularsubject->subject}}</td>
                        <td>{{$regularsubject->credit_hours}}</td>
                        <td></td>
                    </tr>
                        @php
                            $i++;

                        @endphp
                    @endforeach



                    @if($i==1)
                    @for ($j=1;$j<7;$j++)
                    <tr>
                        <td>{{$j}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endfor
                    @else
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endif



                </table>
            </div><br>

            <div class="re-register" style=" margin-top:-15px;">
                <h3>Re-register Courses</h3>
                <table style="width:auto ; text-align: center; width: 100%;  margin-top:-15px;">
                    <tr>
                        <th style="width: auto;">S.No.</th>
                        <th style="width: auto;">Course Code</th>
                        <th style="width: auto;">Course Title</th>
                        <th style="width:auto;">Credit</th>
                        <th style="width:auto;">Remarks</th>
                    </tr>
                    @php
                         $i=1;
                    @endphp

                    @foreach ($formdata->backsubject as $subject)
                    @php
                        $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$regularsubject->subject_code}}</td>
                        <td>{{$regularsubject->subject}}</td>
                        <td>{{$regularsubject->credit_hours}}</td>
                        <td>Re-take</td>
                    </tr>
                        @php
                            $i++;

                        @endphp
                    @endforeach



                    @if($i==1)
                    @for ($j=1;$j<7;$j++)
                    <tr>
                        <td>{{$j}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endfor
                    @elseif($i<4)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @elseif($i<5)
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endif



                </table>

            </div>
            <div class="signature" style="margin-top:2%; margin-right:0%;">

                <div class="col1" style="float: left;;width: 60%; ">
                    <p>signature of the student : <img src="@if(($formdata->signature != "")&&($formdata->signature != null)){{asset('upload/'.$formdata->signature)}}@endif  @if(($formdata->signature_image != "") && ($formdata->signature_image != null)){{asset('storage/signatureimage/'.$formdata->signature_image)}}@endif" width="120" height="60"></p>

                </div>
                <div class="col1" style="float:left; margin-left:10% ;  margin-top:40px;">
                    <p>Date : {{$formdata->created_at->format('Y-m-d')}}</p>

                </div>
            </div>
        </form>
    </div>

























    <div style="page-break-before: always">
        <div class="row">
            <div class="column" style="float: left;margin-left:0.5%;">
                <img src="{{asset('logo/logo.jpg')}}" alt="POKHARA UNIVERSITY" width="100" height="100">

            </div>
            <div class="column" style="text-align: center; margin-left: 0%; ">
                <h2>POKHARA UNIVERSITY<br>Office of the Controller of Examinations<br> Application Form<br>Semester/Trimester/Yearly Examination</h2>
            </div>
            <div class="column" style="margin-top:2px; margin-left: 1%;">

                <input type="image" src="{{URL::asset('storage/'.$formdata->image)}}" width="100" height="100" style="object-fit: fill">

            </div>
        </div>
        <form style="">
            <div class="detail" style="margin-bottom: -15px; margin-top:0px;">

                <div class="col1" style="float: left;;width: 50%; margin-bottom: -15px; margin-top:-15px;">
                    <p>Exam Roll No. : {{$formdata->exam_roll_no}}</p>

                </div>
                <div class="col1" style="float:left; margin-bottom: -15px;margin-top:-15px; ">
                    <p>Exam Center : </p>

                </div>
            </div>
            <div class="col1" style="float: left;width: 50%; margin-bottom: -15px;">
                <p>Level : Bachelor</p>

            </div>
            <div class="col1" style="float:left; margin-bottom: -15px;">
                <p>Program : {{$formdata->program->program}}</p>

            </div>
            <div class="year" style="display: inlineflex; margin-bottom: -30px; margin-top:-10px;">
                <div class="col1" style="float: left;width: 60%; clear: both; margin-bottom: -10px;">
                    <p>Semester/Trimester/Year : {{$formdata->level->level}}</p>

                </div>
                <div class="col1" style="float:left; margin-bottom: -10px; ">
                    <p>Year : {{$formdata->year}}</p>

                </div>
            </div>
            <input type="hidden" id="formid" value="{{$formdata->id}}">
            <div class="name" style="margin-bottom: 8px; margin-top:0px;">
                @php
                    $name = strtoupper($formdata->userdetail->name);
                    $split = str_split($name);
                    $count = count($split);
                    $i=32;
                @endphp
                <table style="width:100%; ">
                    <tr>
                        <th style="width: 80px; text-align:center;">Name</th>
                        @for($j=0;$j<=$i;$j++)
                        @if($j<$count)
                        <td style="width:15px;text-align:center; padding:2px;">{{$split[$j]}}</td>
                        @else
                        <td style="width:15px;text-align:center; padding:2px;"></td>
                        @endif
                        @endfor
                    </tr>
                </table>
            </div>
            <div class="name">
                @php

                $split = str_split($formdata->userdetail->registration_number);
                $count = count($split);

            @endphp
            <table style="width:100%;">
                <tr>
                    <th style="width: 80px;text-align:center;">P.U. Registration No.</th>
                    @for($j=0;$j<=$count;$j++)
                    @if($j<$count)
                    <td style="width:15px;text-align:center;">{{$split[$j]}}</td>
                    @endif
                    @endfor
                </tr>
            </table>

            </div>


            <div class="college" style="float:none ;clear: both; marginm:0px;padding: 0px;">
                <p>Name Of the College : Cosmos College of Management and Technology<br><br>For the appearance in the examination of the following courses as per course registered.</p>
                <h3>Regular Courses</h3>
            </div>
            <div class="regular" style="margin-top:-15px;">
                <table style="width:auto ; text-align: center; width: 100%;">
                    <tr>
                        <th style="width: auto;">S.No.</th>
                        <th style="width: auto;">Course Code</th>
                        <th style="width: auto;">Course Title</th>
                        <th style="width:auto;">Credit</th>
                        <th style="width:auto;">Remarks</th>
                    </tr>
                    @php
                         $i=1;
                    @endphp

                    @foreach ($formdata->subject as $subject)
                    @php
                        $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$regularsubject->subject_code}}</td>
                        <td>{{$regularsubject->subject}}</td>
                        <td>{{$regularsubject->credit_hours}}</td>
                        <td></td>
                    </tr>
                        @php
                            $i++;

                        @endphp
                    @endforeach



                    @if($i==1)
                    @for ($j=1;$j<7;$j++)
                    <tr>
                        <td>{{$j}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endfor
                    @else
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endif



                </table>
            </div><br>

            <div class="re-register" style="margin-top:-15px;">
                <h3>Re-register Courses</h3>
                <table style="width:auto ; text-align: center; width: 100%; margin-top:-15px;">
                    <tr>
                        <th style="width: auto;">S.No.</th>
                        <th style="width: auto;">Course Code</th>
                        <th style="width: auto;">Course Title</th>
                        <th style="width:auto;">Credit</th>
                        <th style="width:auto;">Remarks</th>
                    </tr>
                    @php
                         $i=1;
                    @endphp

                    @foreach ($formdata->backsubject as $subject)
                    @php
                        $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$regularsubject->subject_code}}</td>
                        <td>{{$regularsubject->subject}}</td>
                        <td>{{$regularsubject->credit_hours}}</td>
                        <td>Re-take</td>
                    </tr>
                        @php
                            $i++;

                        @endphp
                    @endforeach



                    @if($i==1)
                    @for ($j=1;$j<7;$j++)
                    <tr>
                        <td>{{$j}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endfor
                    @elseif($i<4)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @elseif($i<5)
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>{{++$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @endif



                </table>

            </div>
            <div class="signature" style="margin-top:2%; margin-right:0%; margin-left:0%;">

                <div class="col1" style="float: left;;width: 250px;margin-right:0%; margin-left:0%; ">
                    <p style="font-size:13px;">signature of the student : <img src="@if(($formdata->signature != "")&&($formdata->signature != null)){{asset('upload/'.$formdata->signature)}}@endif  @if(($formdata->signature_image != "") && ($formdata->signature_image != null)){{asset('storage/signatureimage/'.$formdata->signature_image)}}@endif" width="80" height="40"></p>

                </div>
                <div class="col1" style="float: left;width: 240px; margin-top:20px; margin-right:0%; margin-left:0%;">
                    <p style="font-size:13px;">Form checked and accepted by:..................</p>

                </div>
                <div class="col1" style="float:right; width:120px; margin-top:20px; margin-right:0%; margin-left:0%;">
                    <p style="font-size:13px;">Date : {{$formdata->created_at->format('Y-m-d')}}</p>

                </div>
            </div>
        </form>
    </div>























    <div style="page-break-before: always">
        <div class="row">
            <div class="column" style="float: left;margin-left:0.5%;">
                <img src="{{asset('logo/logo.jpg')}}" alt="POKHARA UNIVERSITY" width="100" height="100">

            </div>
            <div class="column" style="text-align: center; margin-left: 0%; ">
                <h2>POKHARA UNIVERSITY<br>Office of the Controller of Examinations<br> Course Registration Form</h2>
            </div>
            <div class="column" style="margin-top:2px; margin-left: 1%;">

                {{-- <input type="image" src="{{URL::asset('storage/'.$formdata->image)}}" width="100" height="100" style="object-fit: fill"> --}}

            </div>
        </div>
        <form>
            <div class="year" style="display: inlineflex; margin-bottom: -30px; margin-top:-10px;">
                <div class="col1" style="float: left;width: 60%; clear: both; margin-bottom: -15px; margin-top:-30px;">
                    <p>Name of the Student : {{$formdata->userdetail->name}}</p>

                </div>
                <div class="col1" style="float:left; margin-bottom: -15px; margin-top:-30px;">
                    <p>Roll No : {{$formdata->college_roll_no}}</p>

                </div>
            </div>
            <div class="detail" style="margin-bottom: -20px; margin-top:0px;">

                <div class="col1" style="float: left;width: 50%; margin-bottom: -20px; ">
                    <p>Faculty : Science and Technology</p>

                </div>
                <div class="col1" style="float:left;margin-bottom: -20px; ">
                    <p>Level : Bachelor</p>

                </div>
            </div>
            <div class="col1" style="float: left;width: 50%; margin-bottom: -20px;">
                <p>P.U Registration Number : {{$formdata->userdetail->registration_number}}</p>

            </div>
            <div class="col1" style="float:left; margin-bottom: -20px;">
                <p>Program : {{$formdata->program->program}}</p>

            </div>
            <div class="year" style="display: inlineflex; margin-bottom: -30px; margin-top:-10px;">
                <div class="col1" style="float: left;width: 60%; clear: both; margin-bottom: -10px;">
                    <p>Semester/Trimester/Year : {{$formdata->level->level}}</p>
                </div>
                <div class="col1" style="float:left; margin-bottom: -10px; ">
                    <p>Year : {{$formdata->year}}</p>

                </div>
            </div>
            <input type="hidden" id="formid" value="{{$formdata->id}}">



            <div class="college" style="float:none ;clear: both; marginm:0px;padding: 0px;">
                <p>Name Of the College : Cosmos College of Management and Technology</p>

            </div>
            <div class="regular">
                <table style="width:auto ; text-align: center; width: 100%;">
                    <tr>
                        <th style="width: auto;">S.No.</th>
                        <th style="width: auto;">Course Code</th>
                        <th style="width: auto;">Course Title</th>
                        <th style="width:auto;">Credit</th>
                        <th style="width:auto;">Remarks</th>
                    </tr>
                    @php
                         $i=1;
                    @endphp

                    @foreach ($formdata->subject as $subject)
                    @php
                        $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$regularsubject->subject_code}}</td>
                        <td>{{$regularsubject->subject}}</td>
                        <td>{{$regularsubject->credit_hours}}</td>
                        <td></td>
                    </tr>
                        @php
                            $i++;

                        @endphp
                    @endforeach


                    @foreach ($formdata->backsubject as $subject)
                    @php
                        $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$regularsubject->subject_code}}</td>
                        <td>{{$regularsubject->subject}}</td>
                        <td>{{$regularsubject->credit_hours}}</td>
                        <td>Re-take</td>
                    </tr>
                        @php
                            $i++;

                        @endphp
                    @endforeach



                    @if($i<=3)
                    @for ($j=1;$j<12;$j++)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @php
                    $i++;
                @endphp
                    @endfor
                    @elseif($i>3 && $i<= 5)
                    @for ($j=1;$j<10;$j++)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @php
                    $i++;
                @endphp
                    @endfor
                    @elseif($i>5 && $i<=8)
                    @for ($j=1;$j<7;$j++)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @php
                    $i++;
                @endphp
                    @endfor
                    @elseif($i>8 && $i<=10)
                    @for ($j=1;$j<5;$j++)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @php
                    $i++;
                @endphp
                    @endfor
                    @else
                    @for ($j=1;$j<2;$j++)
                    <tr>
                        <td>{{$i}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    @php
                    $i++;
                @endphp
                    @endfor
                    @endif



                </table>
            </div><br>

            <div class="signature" style="margin-top:-20px; margin-right:0%; margin-left:0%;">

                <div class="col1" style="float: left;;width: 60%;margin-right:0%; margin-left:0%; ">
                    <p style="font-size:13px;">signature of the student : <img src="@if(($formdata->signature != "")&&($formdata->signature != null)){{asset('upload/'.$formdata->signature)}}@endif  @if(($formdata->signature_image != "") && ($formdata->signature_image != null)){{asset('storage/signatureimage/'.$formdata->signature_image)}}@endif" width="80" height="40"></p>

                </div>

                <div class="col1" style="float:right; width:40%; margin-top:20px; margin-right:0%; margin-left:0%;">
                    <p style="font-size:13px;">Date : {{$formdata->created_at->format('Y-m-d')}}</p>

                </div>
            </div>

            <hr style="height: 4px; color:rgb(41, 40, 40); background:rgb(54, 54, 54);">


            <div><h3 style="text-align: center; margin:0px;">Recommendation</h3></div>
            <div><p>To the best of my knowledge, the particulars given by Mr./Ms. <b>{{$formdata->userdetail->name}}</b> are correct.<br>recommended for the registration fo the courses listed above. </p></div>
            <div style="display:flex">
                <div style="float: left;width:50%">Seal of the institute</div>
                <div style="float: right; width:50%; text-align:right; text-decoration: overline;">Head of Institute</div>
            </div>
            <div style="display:flex; margin-top:10px;">
                <div style="float: left;width:50%">Note: </div>
                <div style="float: right; width:50%; text-align:right;">Date:.......................</div>
            </div>
            <div>
                <p style="font-size:12px;">
                    - A regular student of the university must register all the courses offered in the concrned semester.<br>
                    - A regular student allowed to register aditional three courses. However a final year student is allowed
                     to register four additional courses and not regular student allowed to register maximum 24 credit hours courses.<br>
                    - If a student is not eligible to register regular subject due to prerequisites, other courses may me registered.
                </p>
            </div>
        </form>
    </div>













    <div style="page-break-before: always">
        <br>
        <div class="row">
            <h2 style="margin:0px;">Name of the Student: {{$formdata->userdetail->name}}</h2>
            <h2 style="margin:0px;">Name of the Student: {{$formdata->exam_roll_no}}</h2>
        </div>
        <div style="text-align:center"><h3>To be filled by the College</h3></div>
        <div style="display: flex;">Attendance percentage : <table><tr><th style="width:150px; padding:20px;"></th></tr></table></div>
        <div>
            <p>Statement of assessment marks obtained :</p>
        </div>
        <div>
            <table style="width:100%;">
                <tr>
                    <th rowspan="2" style="width:15px">S.No. </th>
                    <th rowspan="2" style="width:80px">Course Code </th>
                    <th rowspan="2">Course Title </th>
                    <th colspan="2" style="width:100px">Theory</th>
                    <th colspan="2" style="width:100px">Practical</th>
                    <th rowspan="2">Remarks </th>
                </tr>
                <tr>
                    <th style="width:50px">Full Marks</th>
                    <th style="width:50px">Marks Obtained</th>
                    <th style="width:50px">Full Marks</th>
                    <th style="width:50px">Marks Obtained</th>
                </tr>
                @php
                $i=1;
           @endphp

           @foreach ($formdata->subject as $subject)
           @php
               $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

           @endphp
           <tr>
               <td>{{$i}}</td>
               <td>{{$regularsubject->subject_code}}</td>
               <td>{{$regularsubject->subject}}</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
           </tr>
               @php
                   $i++;

               @endphp
           @endforeach


           @foreach ($formdata->backsubject as $subject)
           @php
               $regularsubject = App\Models\Subject::where('id' , $subject->subject_id)->first();

           @endphp
           <tr>
               <td>{{$i}}</td>
               <td>{{$regularsubject->subject_code}}</td>
               <td>{{$regularsubject->subject}}</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td>Re-take</td>
           </tr>
               @php
                   $i++;

               @endphp
           @endforeach



           @if($i<=3)
           @for ($j=1;$j<15;$j++)
           <tr>
               <td>{{$i}}</td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
           </tr>
           @php
               $i++;
           @endphp
           @endfor
           @elseif($i>3 && $i<=5)
           @for ($j=1;$j<13;$j++)
           <tr>
               <td>{{$i}}</td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
           </tr>
           @php
           $i++;
       @endphp
           @endfor
           @elseif($i>5 && $i<=8)
           @for ($j=1;$j<10;$j++)
           <tr>
               <td>{{$i}}</td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
           </tr>
           @php
           $i++;
       @endphp
           @endfor
           @elseif($i>8 && $i<=10)
           @for ($j=1;$j<8;$j++)
           <tr>
               <td>{{$i}}</td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
           </tr>
           @php
           $i++;
       @endphp
           @endfor
           @else
           @for ($j=1;$j<5;$j++)
           <tr>
               <td>{{$i}}</td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
           </tr>
           @php
           $i++;
       @endphp
           @endfor
           @endif

            </table>
        </div>
        <br>
        <div>
            <b>Account Section</b>
        </div>
        <div>
            <p>Exemanition Fee Rs:<b> @if($formdata->college_roll_no < 170000) 1600 @else 2500 @endif </b> Paid.<br><br>
                Signature: ..........................
            </p>
        </div>
        <br>
        <div>
            <div style="text-decoration: overline; float:left; text-align:left;">Signature of Principal</div>
            <div style="text-decoration: overline; float:right; text-align:right;">Seal of College</div>
        </div>
        <br><br>
        <div>Date : ................................................. </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
    // alert('Press ctrl+p to print or download the admitcard');
//     Swal.fire({
//   icon: 'info',
//   title:'print admitcard',
//   text: 'Press ctrl+p to print or download the admitcard !',
//   footer: ''
// });
    function seen(){


    var id = document.getElementById('formid').value;

    $.post('{{route('seenexamform') }}', {_token:'{{ csrf_token() }}',  formid:id}, function(data)
                {

              });
}
seen();

</script>

</html>
