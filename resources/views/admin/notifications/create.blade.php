<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.app')
<div >
@section('content')
    <div class="app-title">
        <div>
            <h3><i class="fa fa-tags"></i> Create Notification</h3>
            <br>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row" >
        <div class="col-md-8 mx-auto" style="background: rgb(212, 211, 211); height:100%">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <form action="{{ route('admin.usernotification.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                         <div class="form-group">
                            <label class="control-label" for="title">title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" required/>
                            @error('title') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label">File <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('file') is-invalid @enderror" accept=".jpg,.png,.jpeg" type="file" id="file" name="file" required/>
                            @error('file') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Notification</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.usernotification.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
