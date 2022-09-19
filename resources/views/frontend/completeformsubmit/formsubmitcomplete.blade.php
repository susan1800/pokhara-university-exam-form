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
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
    <div>
        <div class="row">
            <div class="column" style="float: left;margin-left:0.5%;">
                <img src="{{url('logo/logo.jpg')}}" alt="POKHARA UNIVERSITY" width="100" height="100">

            </div>
            <div class="column" style="text-align: center; margin-left: 0%; ">
                <h2>POKHARA UNIVERSITY<br>Office of the Controller of Examinations<br> Trimester/Yearly Examination<br>Entrance Card</h2>
            </div>
            <div class="column" style="margin-top:2px; margin-left: 1%;">

                <input type="image" src="{{URL::asset('storage/'.$formdata->image)}}" width="100" height="100" style="object-fit: fill">

            </div>
        </div>
        <form>
            <div class="detail" style="margin-bottom: -15px; margin-top:0px;">

                <div class="col1" style="float: left;;width: 50%; ">
                    <p>Exam Roll No. : {{$formdata->exam_roll_no}}</p>

                </div>
                <div class="col1" style="float:left; ">
                    <p>Exam Center : </p>

                </div>
            </div>
            <div class="name">
                <p>P.U Registration No. : {{$formdata->registration_no}}</p>
            </div>
            <div class="name" style="margin-bottom: -15px; margin-top:0px;">
                <p>Name of the Student : {{$formdata->user->name}}</p>
            </div>
            <div class="col1" style="float: left;width: 50%; margin-bottom: -15px;">
                <p>Level : Bachelor</p>

            </div>
            <div class="col1" style="float:left; margin-bottom: -15px;">
                <p>Program : {{$formdata->program->program}}</p>

            </div>
            <div class="year" style="display: inlineflex; margin-bottom: -30px; margin-top:-15px;">
                <div class="col1" style="float: left;width: 50%; clear: both; margin-bottom: -15px;">
                    <p>Semester/Trimester/Year : {{$formdata->level->level}}</p>

                </div>
                <div class="col1" style="float:left; margin-bottom: -15px; ">
                    <p>Year : {{$formdata->year}}</p>,

                </div>
            </div>
            <div class="college" style="float:none ;clear: both; marginm:0px;padding: 0px;">
                <p>Name Of the College : Cosmos College of Management and Technology<br><br>For the appearance in the examination of the following courses as per course registered.</p>
                <h3>Regular Courses</h3>
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

            <div class="re-register">
                <h3>Re-register Courses</h3>
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
                    <p>signature of the student : <img src="{{url('upload/'.$formdata->signature)}}" width="120" height="40"></p>

                </div>
                <div class="col1" style="float:left; margin-left:10% ;">
                    <p>Date : {{$formdata->created_at->format('Y-m-d')}}</p>

                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    // alert('Form submitted successfully.');
    Swal.fire({
                icon: 'success',
                title: 'success',
                text: 'Form submitted successfully.',
                footer: ''
                })
</script>
</html>