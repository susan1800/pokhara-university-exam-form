<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>

                    <th class="border w-1/4 px-4 py-2">Student Name</th>
                    <th class="border w-1/6 px-4 py-2">College roll no</th>
                    <th class="border w-1/6 px-4 py-2">Form Fee Status</th>
                    @if(session()->get('testadminlogin') == "yes")
                    <th class="border w-1/6 px-4 py-2">Approve Form</th>
                    @endif

                    <th class="border w-1/5 px-4 py-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($searchdatas as $formdata)

                    <tr>
                        <td class="border px-4 py-2">{{$formdata->user->name}}</td>
                        <td class="border px-4 py-2">{{$formdata->college_roll_no}}</td>
                        <td class="border px-4 py-2">
                          @if ($formdata->payment == 1)
                          <i class="fas fa-check text-green-500 mx-2"></i>
                          @else
                          <i class="fas fa-times text-red-500 mx-2"></i>
                          @endif


                        </td>
                        @if(session()->get('testadminlogin') == "yes")
                        <td class="border px-4 py-2">
                            @if ($formdata->approve == 1)
                          <i class="fas fa-check text-green-500 mx-2"></i>
                          @else
                          <i class="fas fa-times text-red-500 mx-2"></i>
                          @endif

                        </td>
                        @endif
                        <td class="border px-4 py-2">

                            <a href="{{route('view.studentdata' , $formdata->id)}}" target="blank" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>

                                    @if(session()->get('testadminlogin') == "yes")
                            {{-- <a href="{{route('editdata',$formdata->id)}}" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a> --}}
                                    @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
