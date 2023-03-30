@extends('layouts.app')

@section('title')
    About Us
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
  <section class="py-5 contact_us">
    <div class="container-lg h-100 d-flex flex-column justify-content-center text-center text-md-start">
      <h1 class="text-white contact_header fw-bold">Get to know us!</h1>
      <h1 class="text-white contact_sub_header fw-bold">About Us</h1>
    </div>
  </section>


  <!-------------------- WE CREATE ----------------------->

  <div class="bg1">
    <div class="container contt">
      <div class="row">
        <div class="col-lg-10 we-create mt-5">
          <h1>
            Your Technology Partner for <span>Business Excellence</span>
        </h1>
        <p style="font-size: 20px">
            Improving <span>Business Efficiency</span> through Innovative Technology & Custom Software Solutions
        </p>
          
          <p>
            We're a <span>B2B Software Solutions Agency</span>, committed to helping government and construction companies improve efficiency by developing and deploying custom software solutions.
            <br>
            Our mission is to help businesses implement and integrate software solutions that increase productivity while optimizing cost-effective options. We provide technical support
            and expertise, and professional guidance, throughout the entire software development process.
            <br>
            Let's Partner with you to give your business the lift that it deserves.
          </p>
          <p>
            <a href="{{ env('APP_URL') }}/contact-us" class="mt-2 me-3 buttn">Contact Us</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <img class="we-create-image" src="imgs/wecreate/Frame 48095725 (4).png" alt="image of people">

  <div class="bg2">
    <div class="container contt">
      <div class="row">
        <div class="col-lg-10 we-create mt-5" style="height: auto !important">
          <h1>
            Who <span>We</span> Are
          </h1>
          <p style="font-size: 20px">
            Think Digital - Building Automated, Real-Time Systems, <span>Custom Innovative Software</span> for Contractors
          </p>
          <p>
            Concise Software Solutions is not your regular B2B software company. As a B2B Software solutions agency, we develop custom software solutions for businesses in the construction industry.
            We Partner with brands that share the same mindset of innovation, allowing us to design products and services that will help them scale their business.
            We believe that technology can be integrated into businesses to drive efficiency and improve productivity. With Concise Software Solutions, you can now manage your projects more efficiently and
            improve communications and collaborations between team members with custom software built to fit how you work.
          </p>
          <p>
            Our goal is to help our clients improve business operations and enhance efficiency by designing responsive procurement, reporting, and logistics software solutions that can be deployed across all platforms – Mobile, Tablet & Web.
            We have got a dedicated team of experts; experienced software engineers, highly trained program managers, and customer 
            service representatives that are driven by the need to help small and medium businesses achieve <span>Success through Technology.</span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-------------------- STAT ----------------------->


  <div class="container- d-flex justify-content-center align-items-center" id="metrics">
    <div class="row">
      <div class="col-lg-12">
        <p class="p">Our Metrics</p>
        <h2>Our metric speaks for us </h2>
        <div class="d-flex justify-content-around flex-">

          <div>
            <h1>30+</h1>
            <p>clients</p>
          </div>
          <div>
            <h1>31+</h1>
            <p>Service Provided</p>
          </div>
          <div>
            <h1>$5M+</h1>
            <p>Saved</p>
          </div>
          <div>
            <h1>100+</h1>
            <p>Hours</p>
          </div>
        </div>


      </div>
    </div>
  </div>

  <!-------------------- MEET OUR TEAM SECTION ----------------------->

  <div class="container our-team" id="teams">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="text-center meet">
          <h1 class="mt-5">Meet Our <span>Awesome</span> Team</h1>
          <p class="mb-5">Take a moment to browse through our team's profile.
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach ($teams as $team)
        <div class="col-lg-3 col-md-3 profile">
          <div class="col-12 rounded" style="height: 345px;
                                            background-image: url({{ $team->filename }});
                                            background-size: contain;
                                            background-position: center center;
                                            background-repeat: no-repeat">
            {{-- <img src="{{ $team->filename }}" alt="{{ $team->name }} - {{ $team->position }}"> --}}
          </div>
          <div class="flex">
            <h6 class="mt-3 ">{{ $team->name }}</h6>
            <p class="">{{ $team->position }}</p>
            <p style="font-family:Manrope; font-size:16px;line-height:22px">{{ $team->bio }}</p>
          </div>
        </div>
      @endforeach
      {{-- <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/2.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/3.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/4.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div> --}}
    </div>

    {{-- <div class="row">
      <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/5.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/6.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/7.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 profile">
        <img src="imgs/wecreate/8.png" alt="image of paris">
        <div class="flex">
          <h6 class="mt-3 ">Brandon Shaw</h6>
          <p class="">founder & CEO</p>
        </div>
      </div>
    </div> --}}


  </div>
  @component('components.scale')
      
  @endcomponent
@endsection