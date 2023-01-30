<!doctype html>
<html lang="en">
<head>
@include('admin.partials.head')


</head>
@yield('style')
<body>
<div class="mx-auto bg-grey-400">
<div class="min-h-screen flex flex-col">
@include('admin.partials.header')
<div class="flex flex-1">
@include('admin.partials.sidebar')
<main class="bg-white-300 flex-1 p-3 overflow-hidden">
<div class="flex flex-col">
    @yield('content')
</main>


@yield('scripts')

<script src="{{asset('backend/js/main.js')}}"></script>
<script src="{{ asset('backend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('backend/js/popper.min.js')}}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js')}} "></script>
<script src="{{ asset('backend/js/plugins/pace.min.js')}}"></script>

</body>
@include('admin.partials.script')
</html>
