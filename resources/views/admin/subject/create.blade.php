<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.app')
@section('style')
@endsection
@section('content')

@include('partials.flash')
<form method="POST" action="{{route('admin.subject.store')}}">
    @csrf
<div class="col-md-12" style="display: flex;">
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Subject</label><br>
        <input type="text" class="form-control " @error('subject')
            style="border-color:red;"
        @enderror name="subject" id="subject" value="{{old('subject')}}">
    </div>
</div>
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Subject Code</label><br>
        <input type="text"  @error('subject_code')
        style="border-color:red;"
    @enderror class="form-control" name="subject_code" id="subject_code" value="{{old('subject_code')}}">
    </div>
</div>

</div>
<div class="col-md-12" style="display: flex;">

<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Credit hours</label><br>
        <input type="text"  @error('credit_hours')
        style="border-color:red;"
    @enderror class="form-control" name="credit_hours" id="credit_hours" value="{{old('credit_hours')}}">
    </div>
</div>




</div>

<div class="col-md-12" style="display: flex;">




<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Level</label><br>
    <select class="form-control" name="level_id"  @error('level_id')
    style="border-color:red;"
@enderror>
        <option value="">select option</option>
        @foreach ($levels as $level)
        @if($level->level != "Passover")
        <option value="{{$level->id}}">{{$level->level}}</option>
        @endif

        @endforeach
    </select>

    </div>
</div>
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Program</label><br>
    <select class="form-control" name="program_id"  @error('program_id')
            style="border-color:red;"
        @enderror>
        <option value="">select option</option>
        @foreach ($programs as $program)
        <option value="{{$program->id}}">{{$program->program}}</option>
        @endforeach
    </select>

    </div>
</div>



</div>
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Batch</label><br>
    <select class="form-control" name="newbatch"  @error('newbatch')
    style="border-color:red;"
@enderror>
        <option value="">select option</option>

        <option value="1"  >New Batch 2020 (Architecture)</option>
        <option value="01"  >Batch 2019 (Architecture)</option>
        <option value="0"  >Before 2019 (Architecture)</option>


            <option value="0" >All batch (BBA)</option>


        <option value="1"  >New Batch 2022</option>
        <option value="0"  >Before 2022</option>

    </select>

    </div>
</div>



<div class="form-row">
    <div class="form-group col-md-12 center" style="text-align: center">
        <input type="submit" class="btn btn-primary"  value="update data">
    </div>
</div>
</form>
@endsection
