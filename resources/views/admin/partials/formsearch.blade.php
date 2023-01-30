<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
       
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                   
                    <th class="border w-1/4 px-4 py-2">Student Name</th>
                    <th class="border w-1/6 px-4 py-2">College roll no</th>
                    <th class="border w-1/6 px-4 py-2">Fee Status</th>
                    <th class="border w-1/6 px-4 py-2">Approve Form</th>
                    
                    <th class="border w-1/5 px-4 py-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($searchdatas as $formdata)
                    
                    <tr>
                        <td class="border px-4 py-2">{{$formdata->name}}</td>
                        <td class="border px-4 py-2">{{$formdata->college_roll_no}}</td>
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
                        <td class="border px-4 py-2">
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>

                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>