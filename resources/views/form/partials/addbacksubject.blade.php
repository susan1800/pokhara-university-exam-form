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

    @foreach ($backsubjects as $back)
    @if(!empty($back))
    @php
    $user_id = session()->get('sessionuseridcosmos');
        $user = App\Models\User::find($user_id);
        if($user->roll_no >= 220000){
            $newbatch = 1;
        }
        else{
            $newbatch = 0;
        }


$backsubject = App\Models\Subject::find($back);


@endphp
    {{-- $backsubject = App\Models\Subject::where('id' , $back)->where('newbatch' , $newbatch)->first();
    @endphp --}}

    <tr style="padding:5px;" id="{{$backsubject->id}}" name="{{$backsubject->id}}">



        @if(!empty($backsubject->barrier_id))
                    <th>
                        @php

                        $barrier = App\Models\Subject::where('id' , $backsubject->barrier_id)->where('newbatch' , $newbatch)->first();


                        @endphp
                            <select class="form-control" onchange="selectbackbarrier(<?php echo $i; ?> )" id="getregularorbarrier<?php echo $i; ?>">

                                <option value="{{$backsubject->subject_code}}" selected>{{$backsubject->subject}}</option>
                                <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>

                            </select>
                            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$backsubject->id}}">
                            <input type="hidden" id="{{$barrier->subject_code}}" value="{{$barrier->id}}">
                            <input type="hidden" id="{{$backsubject->subject_code}}" value="{{$backsubject->id}}">
                            <input type="hidden" id="barrierid{{$i}}" value="{{$i}}">
                        </th>

                            <th id="regularorbarriercode{{$i}}">{{$backsubject->subject_code}}</th>
                            @php

                            $i++;
                        @endphp
                            <td>Back Subject (Remove if you dont have back in this subject)</td>
                            <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$backsubject->id}}')">&#10008;</p></th>
                            </tr>

        @elseif (!empty($backsubject->hasbarrier))
        <th>
            @php

            $barrier = App\Models\Subject::where('id' , $backsubject->hasbarrier)->where('newbatch' , $newbatch)->first();


            @endphp
            <select class="form-control" onchange="selectbackbarrier(<?php echo $i; ?> )" id="getregularorbarrier<?php echo $i; ?>">

                <option value="{{$backsubject->subject_code}}" selected>{{$backsubject->subject}}</option>
                <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>

            </select>
            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$backsubject->id}}">
            <input type="hidden" id="{{$barrier->subject_code}}" value="{{$barrier->id}}">
            <input type="hidden" id="{{$backsubject->subject_code}}" value="{{$backsubject->id}}">
            <input type="hidden" id="barrierid{{$i}}" value="{{$i}}">
        </th>
            <th id="regularorbarriercode{{$i}}">{{$backsubject->subject_code}}</th>
            @php

            $i++;
            @endphp
                <td>Back Subject (Remove if you dont have back in this subject)</td>
            <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$backsubject->id}}')">&#10008;</p></th>
            </tr>

        @else
            <th>
            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$backsubject->id}}">


            {{$backsubject->subject}}
            </th>
            <th>{{$backsubject->subject_code}}
            </th>
       <td>Back Subject (Remove if you dont have back in this subject)</td>
            <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$backsubject->id}}')">&#10008;</p></th>
            </tr>
        @php

        $i++;
    @endphp
        @endif



        @endif



    @endforeach











    <input type="hidden" id="rowvalue" value="{{$i}}">
    </table>






    <script>
        // function removeconcurrent(subjectid){
        //     var j = parseInt(document.getElementById('rowvalue').value);


        // for(k=1;k < j;k++){
        //    backsub = backsub+","+document.getElementById('concurrent'+k).value;
        // }

        // $.post('{{ route('removebacksubject') }}', {_token:'{{ csrf_token() }}',  subjectid:subjectid , backsub:backsub}, function(data)
        //         {
        //           console.log(data);

        //             document.getElementById("backsubjectbody").innerHTML = data;

        //       });
        // }
    </script>
