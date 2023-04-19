@extends('layouts.app')

@section('title')
    About Us
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset("css/other_style.css") }}" />
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
    <section class="py-5 contact_us">
      <div class="container-lg h-100 d-flex flex-column justify-content-center text-center text-md-start">
        <h1 class="contact_header">Get to know us!</h1>
        <h1 class="contact_sub_header fw-bold" style="color: #f2f7fb">
          About Us
        </h1>
      </div>
    </section>


  <!-------------------- WE CREATE ----------------------->

  <div class="bg1">
    <div class="col-lg-11 mx-auto contt">
      <div class="row">
        <div class="col-lg-12 we-create we-creating mt-5">
          <h1 class="we_create_h1">
            Improving <span>Business Efficiency</span> through Innovative Technology & <span>Custom Software Solutions</span>
          </h1>
          
          <p>
            We're a B2B Software Solutions Agency, committed to helping government and construction companies improve efficiency by developing and deploying custom software solutions.
            <br>
            Our mission is to help businesses implement and integrate software solutions that increase productivity while optimizing cost-effective options. We provide technical support
            and expertise, and professional guidance, throughout the entire software development process.
            <br>
            Let's Partner with you to give your business the lift that it deserves.
          </p>
        </div>
      </div>
    </div>
  </div>

  <img class="we-create-image" src="imgs/wecreate/Frame 48095725 (4).png" alt="image of people">

  <div class="bg2">
    <div class="col-lg-11 mx-auto contt">
      <div class="row">
        <div class="col-lg-11 we-create we-creating mt-5">
          <h1 class="we_create_h1">
            Think Digital - Building Automated, Real-Time Systems, Custom Innovative Software for Contractors
          </h1>
          <p>
            Concise Software Solutions is not your regular B2B software company. As a B2B Software solutions agency, we develop custom software solutions for businesses in the construction industry.
            We Partner with brands that share the same mindset of innovation, allowing us to design products and services that will help them scale their business.
            We believe that technology can be integrated into businesses to drive efficiency and improve productivity. With Concise Software Solutions, you can now manage your projects more efficiently and
            improve communications and collaborations between team members with custom software built to fit how you work.
          </p>
          <p>
            Our goal is to help our clients improve business operations and enhance efficiency by designing responsive procurement, reporting, and logistics software solutions that can be deployed across all platforms – Mobile, Tablet & Web.
            We have got a dedicated team of experts; experienced software engineers, highly trained program managers, and customer 
            service representatives that are driven by the need to help small and medium businesses achieve Success through Technology.
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
        <div class="d-flex flex- row">

          <div class="col-3">
            <h1>30+</h1>
            <p>clients</p>
          </div>
          <div class="col-3">
            <h1>31+</h1>
            <p>Service Provided</p>
          </div>
          <div class="col-3">
            <h1>$5M+</h1>
            <p>Saved</p>
          </div>
          <div class="col-3">
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
        <div class="col-lg-3 col-md-6 profile">
          <div class="col-12 rounded" style="height: 345px;
                                            background-image: url({{ $team->filename }});
                                            background-size: cover;
                                            background-position: top center;
                                            background-repeat: no-repeat">
            {{-- <img src="{{ $team->filename }}" alt="{{ $team->name }} - {{ $team->position }}"> --}}
          </div>
          <div class="flex">
            <h6 class="mt-3 ">{{ $team->name }}</h6>
            <p class="position">{{ $team->position }}</p>
            <p class="profile-desc">{{ $team->bio }}</p>
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