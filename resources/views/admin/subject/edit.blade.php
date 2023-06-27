<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.app')
@section('style')
@endsection
@section('content')

@include('partials.flash')
<form method="POST" action="{{route('admin.subject.update')}}">
    @csrf
<input type="hidden" name="id" id="id" value="{{$subject->id}}">
<div class="col-md-12" style="display: flex;">
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Subject</label><br>
        <input type="text" class="form-control " @error('subject')
            style="border-color:red;"
        @enderror name="subject" id="subject" value="{{old('subject',$subject->subject)}}">
    </div>
</div>
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Subject Code</label><br>
        <input type="text"  @error('subject_code')
        style="border-color:red;"
    @enderror class="form-control" name="subject_code" id="subject_code" value="{{old('subject_code',$subject->subject_code)}}">
    </div>
</div>

</div>
<div class="col-md-12" style="display: flex;">

<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Credit hours</label><br>
        <input type="text"  @error('credit_hours')
        style="border-color:red;"
    @enderror class="form-control" name="credit_hours" id="credit_hours" value="{{old('credit_hours',$subject->credit_hours)}}">
    </div>
</div>
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Is Barrier</label><br>
    <select class="form-control" name="is_barrier">
        <option value="">select option</option>
        @foreach ($subjects as $sub)
        <option value="{{$sub->id}}" @if($subject->is_barrier == $sub->id) selected @endif>{{$sub->subject}}</option>
    @endforeach
    </select>

    </div>
</div>



</div>
<div class="col-md-12" style="display: flex;">



<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Barrier subject</label><br>
    <select class="form-control" name="barrier_id">
        <option value="">select option</option>
        @foreach ($subjects as $sub)
            <option value="{{$sub->id}}" @if($subject->barrier_id == $sub->id) selected @endif>{{$sub->subject}}</option>
        @endforeach
    </select>

    </div>
</div>
<div class="form-row col-md-6">
    <div class="form-group col-md-12">
    <label for="inputEmail4">Concurrent subject</label><br>
    <select class="form-control" name="concurrent_id">
        <option value="">select option</option>
        @foreach ($subjects as $sub)
        <option value="{{$sub->id}}" @if($subject->concurrent_id == $sub->id) selected @endif>{{$sub->subject}}</option>
    @endforeach
    </select>

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
        <option value="{{$level->id}}" @if($subject->level_id == $level->id) selected @endif>{{$level->level}}</option>
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
        <option value="{{$program->id}}" @if($subject->program_id == $program->id) selected @endif>{{$program->program}}</option>
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
       @if(($subject->program->program == "Architecture"))
        <option value="1" @if($subject->newbatch == '1') selected @endif>New Batch 2020</option>
        <option value="01" @if($subject->newbatch == '01') selected @endif>Batch 2019</option>
        <option value="0" @if($subject->newbatch == '0') selected @endif>Before 2019</option>
        @elseif($subject->program->program == "BBA")
        <option>
            <option value="0" selected>All batch</option>
        </option>
        @else
        <option value="1" @if($subject->newbatch == '1') selected @endif>New Batch 2022</option>
        <option value="0" @if($subject->newbatch == '0') selected @endif>Before 2022</option>
        @endif
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
