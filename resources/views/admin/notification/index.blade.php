@extends('admin.app')

@section('style')
<style>
    .notification{
        width:100%;
        height: auto;
        display: flex;

        padding: 5px;
    }
    .notification-icon{
        width: 50px;
    }
    .container{
        padding: auto;
        margin:auto;
    }
    a{
        text-decoration: none;
        color:black;
    }
    a:hover{
        text-decoration: none;

    }
</style>
@endsection
@section('content')
@include('admin.partials.flash')



<div class="container">
    @foreach ($notifications as $notification)

    <a href="{{route('view.studentdata' , $notification->form_id)}}" target="blank" >
            <div class="notification" style="@if($notification->seen == 0)  background: #bfbfbf; @endif">
                <h3 class="notification-icon"><img src="{{asset('frontend/image/icon.jpg')}}" width="40" height="10" style="border-radius: 50%; margin-right:40px;"></h3> </th>
                <p style="margin-left:20px;">{{$notification->form->name}} filled up the form. <br>{{ $notification->created_at->format('d-M-Y')}}</p>

            </div>
            <hr color="red" style="margin: 0px; height:1px;">
        </a>
    @endforeach

</div>


@endsection


@include('admin.partials.script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>

<script>
    setnotificationcountzero();
    function setnotificationcountzero(){

        $.get('{{ route('notificationcountsetzero') }}',  function(data)
    {


    });

    }
</script>
@section('script')  @endsection

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
