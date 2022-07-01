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
   
        <a href="#">
            <div class="notification" style="@if($notification->seen == 0)  background: #bfbfbf; @endif">
                <h3 class="notification-icon">&#9758;</h3> </th>
                <p>{{$notification->form->name}} fill the form </p>
            </div>
            <hr color="red" style="margin: 0px; height:1px;">
        </a>
    @endforeach
    
</div>

  
@endsection


@include('admin.partials.script')
<script>
    setnotificationcountzero();
    function setnotificationcountzero(){
       
        $.get('{{ route('notificationcountsetzero') }}',  function(data)
    {
        
      
    });
    
    }
</script>
@section('script')  @endsection
