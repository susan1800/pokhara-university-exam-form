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
    
    @foreach ($backs as $back)
    @if(!empty($back))
    @php
    $backsubject = App\Models\Subject::where('id' , $back)->first();
    @endphp
    
    <tr style="padding:5px;" id="{{$backsubject->id}}" name="{{$backsubject->id}}">



        @if(!empty($backsubject->barrier_id))
                    <th>
                        @php
                        
                        $barrier = App\Models\Subject::where('id' , $backsubject->barrier_id)->first();
                        
                       
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
            
            $barrier = App\Models\Subject::where('id' , $backsubject->hasbarrier)->first();
            
        
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










    @if(!empty($backconcurrent))
    @php
                $available = 0;
            @endphp
    @foreach ($backs as $back)
        @if($backconcurrent->id == $back)
            @php
                $available = 1;
                break;
            @endphp
            
        @endif
    @endforeach
    @if($available != 1)
    
    
    <tr style="padding:5px;" id="{{$backconcurrent->id}}" name="{{$backconcurrent->id}}">
        <th>
            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$backconcurrent->id}}">
               
            @php
               
                $i++;
            @endphp
                
           {{$backconcurrent->subject}} 
        </th>
        <th>{{$backconcurrent->subject_code}}
        </th>
        <td>Back Subject (Remove if you dont have back in this subject)</td>
        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$backconcurrent->id}}')">&#10008;</p></th>
    </tr>







    @if (!empty($backconcurrent->concurrent_id))
                    <tr style="padding:5px;" id="{{$backconcurrent->concurrent_id}}" name="{{$backconcurrent->concurrent_id}}">
                        <th>
                            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$backconcurrent->concurrent_id}}">
                               
                            @php
                                $concurrent = App\Models\Subject::where('id' , $backconcurrent->concurrent_id)->first();
                                $i++;
                            @endphp
                                
                           {{$concurrent->subject}} 
                        </th>
                        <th>{{$concurrent->subject_code}}
                        </th>
                        <td>Back Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$concurrent->id}}')">&#10008;</p></th>
                    </tr>



    @endif

    @endif
    @endif























    @if(!empty($addbacksub))

    @if(empty($addbacksub->barrier_id) && empty($addbacksub->hasbarrier))

    <tr style="padding:5px;" id="{{$addbacksub->id}}" name="{{$addbacksub->id}}">
        <th>
            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$addbacksub->id}}">
               
            @php
                $i++;
            @endphp
                
           {{$addbacksub->subject}} 
        </th>
        <th>{{$addbacksub->subject_code}}
        </th>
        <td>Back Subject (Remove if you dont have back in this subject)</td>
    <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$addbacksub->id}}')">&#10008;</p></th>
    </tr>
        
    
    @elseif (!empty($addbacksub->barrier_id) && empty($addbacksub->hasbarrier))
       

    @php
    $barrier = App\Models\Subject::where('id' , $addbacksub->barrier_id)->first();
    
   
    @endphp
     <th>
        <select class="form-control" style="width: auto;" onchange="selectbackbarrier(<?php echo $i; ?> )" id="getregularorbarrier<?php echo $i; ?>">
           
            <option value="{{$addbacksub->subject_code}}" selected>{{$addbacksub->subject}}</option>
            <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>
            
        </select>
        <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$addbacksub->id}}">
        <input type="hidden" id="{{$barrier->subject_code}}" value="{{$barrier->id}}">
        <input type="hidden" id="{{$addbacksub->subject_code}}" value="{{$addbacksub->id}}">
        <input type="hidden" id="barrierid{{$i}}" value="{{$i}}">

     </th>
     
        <th id="regularorbarriercode{{$i}}">{{$addbacksub->subject_code}}</th>
        @php
                $i++;
            @endphp
        <td>Back Subject (Remove if you dont have back in this subject)</td>
        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$addbacksub->id}}')">&#10008;</p></th>
        </tr>
        

    @elseif (empty($addbacksub->barrier_id) && !empty($addbacksub->hasbarrier))

    @php
    $barrier = App\Models\Subject::where('id' , $addbacksub->hasbarrier)->first();
    
   
    @endphp
     <th>
        <select class="form-control" style="width: auto;" onchange="selectbackbarrier(<?php echo $i; ?> )" id="getregularorbarrier<?php echo $i; ?>">
           
            <option value="{{$addbacksub->subject_code}}" selected>{{$addbacksub->subject}}</option>
            <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>
            
        </select>
        <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$addbacksub->id}}">
        <input type="hidden" id="{{$barrier->subject_code}}" value="{{$barrier->id}}">
        <input type="hidden" id="{{$addbacksub->subject_code}}" value="{{$addbacksub->id}}">
        <input type="hidden" id="barrierid{{$i}}" value="{{$i}}">
     </th>
        <th id="regularorbarriercode{{$i}}">{{$addbacksub->subject_code}}</th>
        @php
                $i++;
            @endphp

        <td>Back Subject (Remove if you dont have back in this subject)</td>
        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$addbacksub->id}}')">&#10008;</p></th>
        </tr>

    @endif
    







    @if (!empty($addbacksub->concurrent_id))
    <tr style="padding:5px;" id="{{$addbacksub->concurrent_id}}" name="{{$addbacksub->concurrent_id}}">
        <th>
            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$addbacksub->concurrent_id}}">
               
            @php
                $concurrent = App\Models\Subject::where('id' , $addbacksub->concurrent_id)->first();
                $i++;
            @endphp
                
           {{$concurrent->subject}} 
        </th>
        <th>{{$concurrent->subject_code}}
        </th>
        <td>Back Subject (Remove if you dont have back in this subject)</td>
        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$concurrent->id}}')">&#10008;</p></th>
    </tr>



@endif





    @endif
  






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