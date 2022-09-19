<style>
    .mousefocus:hover{
        cursor: pointer;
    }
</style>
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
                
                @foreach ($subjects as $subject)
                <tr id="">
                    <th><input type ="hidden" name = '{{$i}}' id="{{$i}}" value = '{{$subject->id}}'/><p>{{$i}}</p></th>
                    <th>
                        @if (!empty($subject->barrier_id))
                        @php
                        $barrier = App\Models\Subject::where('id' , $subject->barrier_id)->first();
                        
                       
                        @endphp
                            <select class="form-control" onchange="selectbarrier()" id="getregularorbarrier">
                               
                                <option value="{{$subject->subject_code}}" selected>{{$subject->subject}}</option>
                                <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>
                                
                            </select>
                            
                            <input type="hidden" id="{{$barrier->subject_code}}" value="{{$barrier->id}}">
                            <input type="hidden" id="{{$subject->subject_code}}" value="{{$subject->id}}">
                            <input type="hidden" id="barrierid" value="{{$i}}">
                            <th id="regularorbarriercode">{{$subject->subject_code}}</th>
                        @else
                            {{$subject->subject}}
                            <th>{{$subject->subject_code}}</th>
                        @endif
                    </th>
                    
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
                    <option value="{{$allsubject->subject_code}}">{{$allsubject->subject}}</option>

                    @endforeach
                 </select>
                 @foreach ($allsubjects as $allsubject)
                        
                
                  <input type="hidden" value="{{$allsubject->subject}}" id="{{$allsubject->subject_code}}">
                  <input type="hidden" value="{{$allsubject->id}}" id="{{$allsubject->subject_code.'id'}}">
                 
                  @endforeach
                <h1 class="mousefocus" onclick="addbackrow()">&#10146;</h1>
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
                    
                    @foreach ($subjects as $concurrentsubject)
                    @if (!empty($concurrentsubject->concurrent_id))
                    <tr style="padding:5px;" id="{{$concurrentsubject->id}}" name="{{$concurrentsubject->id}}">
                        <th>
                            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$concurrentsubject->concurrent_id}}">
                               
                            @php
                                $concurrent = App\Models\Subject::where('id' , $concurrentsubject->concurrent_id)->first();
                                $i++;
                            @endphp
                                
                           {{$concurrent->subject}} 
                        </th>
                        <th>{{$concurrent->subject_code}}
                        </th>
                        <td>Concurrent Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$subject->id}}')">&#10008;</p></th>
                    </tr>
                    

                   









                    @if (!empty($concurrent->concurrent_id))
                    <tr style="padding:5px;" id="{{$concurrent->id}}" name="{{$concurrent->id}}">
                        <th>
                            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$concurrent->concurrent_id}}">
                               
                            @php
                                $concurrent = App\Models\Subject::where('id' , $concurrent->concurrent_id)->first();
                                $i++;
                            @endphp
                                
                           {{$concurrent->subject}} 
                        </th>
                        <th>{{$concurrent->subject_code}}
                        </th>
                        <td>Concurrent Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$subject->id}}')">&#10008;</p></th>
                    </tr>
                    








                    @if (!empty($concurrent->concurrent_id))
                    <tr style="padding:5px;" id="{{$concurrent->id}}" name="{{$concurrent->id}}">
                        <th>
                            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$concurrent->concurrent_id}}">
                               
                            @php
                                $concurrent = App\Models\Subject::where('id' , $concurrent->concurrent_id)->first();
                                $i++;
                            @endphp
                                
                           {{$concurrent->subject}} 
                        </th>
                        <th>{{$concurrent->subject_code}}
                        </th>
                        <td>Concurrent Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$subject->id}}')">&#10008;</p></th>
                    </tr>
                    







                    @if (!empty($concurrent->concurrent_id))
                    <tr style="padding:5px;" id="{{$concurrent->id}}" name="{{$concurrent->id}}">
                        <th>
                            <input type="hidden" name="15{{$i}}" id="concurrent{{$i}}" value="{{$concurrent->concurrent_id}}">
                               
                            @php
                                $concurrent = App\Models\Subject::where('id' , $concurrent->concurrent_id)->first();
                                $i++;
                            @endphp
                                
                           {{$concurrent->subject}} 
                        </th>
                        <th>{{$concurrent->subject_code}}
                        </th>
                        <td>Concurrent Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$subject->id}}')">&#10008;</p></th>
                    </tr>
                    

                   
                    @endif

                    @endif

                    @endif

                    @endif
                   
                    
                    @endforeach
                    <input type="hidden" id="rowvalue" value="{{$i}}">
                    </table>
            </div>
</div>



<script>


function selectbarrier(){
        var code = document.getElementById('getregularorbarrier').value;
        var subjectid = document.getElementById(code).value;
        var id = document.getElementById('barrierid').value;
        // alert("This is Barrier subject , are you sure to change it ?");
        Swal.fire({
        icon: 'info',
        title: '',
        text: 'This is Barrier subject , are you sure to change it ?',
        footer: '',
        });

        document.getElementById('regularorbarriercode').innerHTML=code;
        document.getElementById(id).value = subjectid;
        var subjectid = document.getElementById(code).value;

        var backsub = "";
        var addbacksub = "";
        var j = parseInt(document.getElementById('rowvalue').value);
     
       
        for(k=1;k < j;k++){
           backsub = backsub+","+document.getElementById('concurrent'+k).value;
        }

        $.post('{{ route('selectConcurrentAndBackSubject') }}', {_token:'{{ csrf_token() }}',  subjectid:subjectid , backsub:backsub , addbacksub:addbacksub}, function(data)
                {
                  console.log(data);
                  
                    document.getElementById("backsubjectbody").innerHTML = data;
                
              });

        
        









    }


    function selectbackbarrier(i){
      
        var code = document.getElementById('getregularorbarrier'+i).value;
        var subjectid = document.getElementById(code).value;
        var id = document.getElementById('barrierid'+i).value;
        // alert("This is Barrier subject , are you sure to change it ?");
        Swal.fire({
        icon: 'info',
        title: '',
        text: 'This is Barrier subject , are you sure to change it ?',
        footer: '',
        });
        

        document.getElementById('regularorbarriercode'+i).innerHTML=code;
        document.getElementById(id).value = subjectid;
        var subjectid = document.getElementById(code).value;
    }

    function removeconcurrent(subjectid){
        Swal.fire({
  title: 'This is Back/concurrent subject , are you sure to remove ?',
  icon:'question',
  showCancelButton: true,
  confirmButtonText: 'yes remove it',
  cancelButtonText: `cancel it`,
}).then((result) => {
  if (result.isConfirmed) {
            var j = parseInt(document.getElementById('rowvalue').value);
     
       var backsub = "";
       try {
     for(k=1;k < j;k++){
        backsub = backsub+","+document.getElementById('concurrent'+k).value;
     }
    }catch(err){
        location.reload();
    }

     $.post('{{ route('removebacksubject') }}', {_token:'{{ csrf_token() }}',  subjectid:subjectid , backsub:backsub}, function(data)
             {
               console.log(data);
               
                 document.getElementById("backsubjectbody").innerHTML = data;
             
           });
 
        // var table = document.getElementById('backtable');
	// var rowCount = table.rows.length;
    // var row = $(this).closest("tr"); 
    // alert(row);
	// if(rowCount > '0'){
	// 	var row = table.deleteRow(row);
	// 	rowCount--;
	// }
    // var td = event.target.parentNode; 
    //   var tr = td.parentNode; // the row to be removed
    //   tr.parentNode.removeChild(tr);
	
}  
});
        } 



        function removeRow(btnName) {  
    try {  
        var table = document.getElementById('backtable');
	// var rowCount = table.rows.length;
    // var row = $(this).closest("tr"); 
	// if(rowCount > '0'){
	// 	var row = table.deleteRow(row);
	// 	rowCount--;
	// }
    var td = event.target.parentNode; 
      var tr = td.parentNode; // the row to be removed
      tr.parentNode.removeChild(tr);
    } catch (e) {  
        alert(e);  
    }  
} 
        






    function addbackrow(){


        var table = document.getElementById('backtable');
        var level = document.getElementById('level').value;
        var code=document.getElementById('addbacksubject').value;
        var addbacksub=document.getElementById(code+'id').value;
        var subject=document.getElementById(code).value;



        var backsub = "";
        var subjectid = "";
        var j = parseInt(document.getElementById('rowvalue').value);
     
       
        for(k=1;k < j;k++){
           backsub = backsub+","+document.getElementById('concurrent'+k).value;
        }

        $.post('{{ route('selectConcurrentAndBackSubject') }}', {_token:'{{ csrf_token() }}',  subjectid:subjectid , backsub:backsub , addbacksub:addbacksub}, function(data)
                {
                  console.log(data);
                  
                    document.getElementById("backsubjectbody").innerHTML = data;
                
              });















        // if(code!= ''){
        // var row = table.insertRow();
        // var cell1 = row.insertCell(0);
        // var cell2 = row.insertCell(1);
        // var cell3 = row.insertCell(2);
        // var cell4 = row.insertCell(3);
        
        // cell1.innerHTML = "<br>"+subject+"</br>";
        // cell2.innerHTML = "<br>"+code+"</br>";
        // cell3.innerHTML = "retake";
       
        // var cell5 = row.insertCell(4); 
        // var rowCount = table.rows.length;  
        // var row = table.insertRow(rowCount);  
        
        
        
        // cell4.type = "button";  
        // var btnName = "button" + (rowCount + 1);  
        // cell4.name = btnName;  
        // cell4.setAttribute('value', 'Delete'); // or cell4.value = "button";  
        // cell4.onclick = function() {  
        //     removeRow(btnName);  
        // }  
        // cell4.innerHTML = '<p style="color:red;text-align:center;">&#10008;</p>'
        // var rowcount1 = rowCount;
        // cell5.innerHTML = "<input type='hidden' name='15"+rowcount1+"' value='"+subjectid+"'>"
        
        
        // }
    
    }



   




</script>