<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.app')

@section('style')
    <style>

    </style>
@endsection

@section('content')

    <!--Grid Form-->

    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">

                  <div>
                    @include('partials.flash')


                    <a href="{{route('admin.usernotification.create')}}" class="btn btn-primary">Create Notification</a>


                    </div>


            </div>

            <div class="col-md-12" style="width: 100%;">

                <table class=" rounded col-md-12" style="width: 100%;">
                    <thead style="width: 100%;">
                        <tr style="width: 100%;">
                            <th class="border  px-4 py-2">SN</th>
                            <th class="border  px-6 py-2">Title</th>
                            <th class="border  px-4 py-2">File</th>
                            <th class="border  px-4 py-2">Actions</th>

                        </tr>
                    </thead>
                    <tbody style="width: 100%;">
                        @php
                            $i=1;
                        @endphp
                        @foreach ($notifications as $notification)

                            <tr>
                                <td class="border px-4 py-2">{{$i}}</td>
                                <td class="border px-4 py-2">{{ $notification->title }}</td>



                                <td class="border px-4 py-2">
                                    <a href="{{asset('storage/'.$notification->file)}}" target="blank" class="btn btn-primary">
                                   View file
                                    </a>
                                </td>

                                <td class="border px-4 py-2">
                                    @if($notification->status =='1')
                                    <a href="{{route('admin.usernotification.disable',$notification->id)}}" class="btn btn-primary"> <i class="fas fa-eye" aria-hidden="true"></i></a>
                                    @else
                                    <a href="{{route('admin.usernotification.disable',$notification->id)}}" class="btn btn-danger"> <i class="fas fa-eye" aria-hidden="true"></i></a>
                                    @endif
                                  <a href="{{route('admin.usernotification.edit',$notification->id)}}" class="btn btn-primary">  <i class="fas fa-edit"></i></a>
                                </td>



                            </tr>
                            @php
                            $i++;
                        @endphp
                        @endforeach



                    </tbody>
                </table>






            </div>
        </div>
    </div>
    <!--/Grid Form-->

<br>
    {{-- <div class="pagination-wrapper centred">
        <div class="d-flex justify-content-center">
            {{ $payments->links() }}<br>
        </div>
    </div> --}}
<br><br>

@endsection
<script>




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

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('script')
@endsection
