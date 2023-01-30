<!--Sidebar-->
<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

<ul class="list-reset flex flex-col">
    <a href="/admin/"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
    <li class=" w-full h-full py-3 px-2 border-b border-light-border @if($pageTitle == "dashboard") bg-white @endif">

            <i class="fas fa-tachometer-alt float-left mx-2"></i>
            Dashboard
            <span><i class="fas fa-angle-right float-right"></i></span>

    </li>
    </a>
    <a href="{{route('admin.formdata.index')}}"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
    <li class=" w-full h-full py-3 px-2 border-b border-light-border @if($pageTitle == "view form") bg-white @endif ">

            <i class="fab fa-wpforms float-left mx-2"></i>
            View Form
            <span><i class="fas fa-angle-right float-right"></i></span>

    </li>
    </a>
    <a href="{{route('admin.paymentstatus.index')}}"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
    <li class=" w-full h-full py-3 px-2 border-b border-light-border @if($pageTitle == "payment status") bg-white @endif ">

            <i class="fab fa-wpforms float-left mx-2"></i>
            All Student Status
            <span><i class="fas fa-angle-right float-right"></i></span>

    </li>
    </a>

</ul>

</aside>
<!--/Sidebar-->
