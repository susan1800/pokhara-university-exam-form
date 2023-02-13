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
    <li class=" w-full h-full py-3 px-2 border-b border-light-border @if(($pageTitle == "view form")||($pageTitle == "Edit form")) bg-white @endif ">

            <i class="fab fa-wpforms float-left mx-2"></i>
            View Form
            <span><i class="fas fa-angle-right float-right"></i></span>

    </li>
    </a>
    <a href="{{route('admin.paymentstatus.index')}}"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
    <li class=" w-full h-full py-3 px-2 border-b border-light-border @if($pageTitle == "Student Status") bg-white @endif ">

            <i class="fab fa-wpforms float-left mx-2"></i>
            All Student Status
            <span><i class="fas fa-angle-right float-right"></i></span>

    </li>
    </a>
    <a href="{{route('exam.detail')}}"
    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
<li class=" w-full h-full py-3 px-2 border-b border-light-border @if($pageTitle == "Exam Details") bg-white @endif ">

     <i class="fab fa-wpforms float-left mx-2"></i>
     Exam Details
     <span><i class="fas fa-angle-right float-right"></i></span>

</li>
</a>

<a href="{{route('show.triplicate')}}"
class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
<li class=" w-full h-full py-3 px-2 border-b border-light-border @if($pageTitle == "Download Triplicate") bg-white @endif ">

 <i class="fab fa-wpforms float-left mx-2"></i>
 Download Triplicate
 <span><i class="fas fa-angle-right float-right"></i></span>

</li>
</a>

</ul>

</aside>
<!--/Sidebar-->
