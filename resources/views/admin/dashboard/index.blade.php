@extends('admin.app')

@section('style')
<style>


#my-pie-chart-container {
  display: flex;
  align-items: center;

}


#my-pie-chart {
  background: conic-gradient(brown 0.00%, black 0.00% 0.55%, blue 0.55% 6.08%, green 6.08% 13.68%, yellow 13.68% 23.27%, orange 23.27% 40.47%, red 40.47%);
  border-radius: 50%;
    width: 280px;
    height: 250px;
}

#legenda {
  margin-left: 20px;
  background-color: white;
  padding: 5px;
}

.entry {
  display: flex;
  align-items: center;
}

.entry-color {
    height: 10px;
    width: 10px;
}

.entry-text {
  margin-left: 5px;
}

#color-red {
  background-color: red;
}

#color-orange {
  background-color: orange;
}

#color-yellow {
  background-color: yellow;
}

#color-green {
  background-color: green;
}

#color-blue {
  background-color: blue;
}

#color-black {
  background-color: black;
}

#color-brown {
  background-color: brown;
}

    </style>
@endsection
@section('content')
@include('admin.partials.flash')
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    {{$formfilled}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Form filled
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    {{$formapproved}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Approved Form 
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    {{$formapprovedremaining}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Approval Remaining 
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    {{$newform}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                  New filled form
                                </a>
                            </div>
                        </div>
                    </div>

                    <br>
                    <h2>Payment Approved</h2>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                      <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                          <div class="p-4 flex flex-col">
                              <a href="#" class="no-underline text-white text-2xl">
                                  {{$totalstudent}}
                              </a>
                              <a href="#" class="no-underline text-white text-lg">
                                  Total Students
                              </a>
                          </div>
                      </div>

                      <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                          <div class="p-4 flex flex-col">
                              <a href="#" class="no-underline text-white text-2xl">
                                  {{$totalstudent-$approvelogin}}
                              </a>
                              <a href="#" class="no-underline text-white text-lg">
                                  Remaining to approve
                              </a>
                          </div>
                      </div>

                      <!--<div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">-->
                      <!--    <div class="p-4 flex flex-col">-->
                      <!--        <a href="#" class="no-underline text-white text-2xl">-->
                                  
                      <!--        </a>-->
                      <!--        <a href="#" class="no-underline text-white text-lg">-->
                      <!--            Payments Remaining -->
                      <!--        </a>-->
                      <!--    </div>-->
                      <!--</div>-->

                      <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                        <div class="p-4 flex flex-col">
                            <a href="#" class="no-underline text-white text-2xl">
                                {{$approvelogin}}
                            </a>
                            <a href="#" class="no-underline text-white text-lg">
                                Approved  Login 
                            </a>
                        </div>
                    </div>

                      
                  </div>


                    <!-- /Stats Row Ends Here -->

{{-- <section>
    <h1>Form Fillup details</h1>

<div id="my-pie-chart-container">
  <div id="my-pie-chart"></div>

  <div id="legenda">
    <div class="entry">
      <div id="color-brown" class="entry-color"></div>
      <div class="entry-text">Form</div>
    </div>
    <div class="entry">
      <div id="color-black" class="entry-color"></div>
      <div class="entry-text">Australia</div>
    </div>
    <div class="entry">
      <div id="color-blue" class="entry-color"></div>
      <div class="entry-text">South America</div>
    </div>
    <div class="entry">
      <div id="color-green" class="entry-color"></div>
      <div class="entry-text">North America</div>
    </div>
    <div class="entry">
      <div id="color-yellow" class="entry-color"></div>
      <div class="entry-text">Europe</div>
    </div>
    <div class="entry">
      <div id="color-orange" class="entry-color"></div>
      <div class="entry-text">Africa</div>
    </div>
    <div class="entry">
      <div id="color-red" class="entry-color"></div>
      <div class="entry-text">Asia</div>
    </div>
  </div>
</div>

</section> --}}
@endsection

@section('script')  @endsection
