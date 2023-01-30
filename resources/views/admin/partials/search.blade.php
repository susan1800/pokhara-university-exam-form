

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


                     <!--Grid Form-->

                     <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

                            <div class="p-3">
                                <table class="table-responsive w-full rounded" style="width: 100%;">
                                @if (count($searchpayments) > 0)
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Student Name</th>

                                        <th class="border w-1/7 px-4 py-2">Approve Form</th>
                                        <th class="border w-1/7 px-4 py-2">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($searchpayments as $payment)
                                        <tr>
                                            <td class="border px-4 py-2">{{$payment->name}} {{$payment->roll_no}}</td>


                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" @if ($payment->approve_form == 1)
                                                    checked
                                                    @endif value="{{$payment->id}}"  onchange="changeformstatussearch(this)">
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a onclick="editdata('{{ $payment->id }}','{{$payment->name}}','{{$payment->registration_number}}','{{ $payment->roll_no }}')">  <i class="fas fa-edit"></i></a>
                                              </td>

                                        </tr>
                                        @endforeach



                                    </tbody>
                                @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->

<script>
                    function changeformstatussearch(event){


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
                                          position: 'bottom',
                                          title: '  status has been updated successfully !',
                                          icon: 'success'
                                        });

                                      }
                                      else{
                                        toastMixin.fire({
                                          animation: true,
                                          position: 'bottom',
                                          title: 'Something wrong please try again !',
                                          icon: 'error'
                                        });
                                      }
                                  });

                    }

                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
