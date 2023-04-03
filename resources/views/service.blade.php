@extends('layouts.app')

@section('title')
    {{ $service->title }}
@endsection

@section('content')
     <!---------------------------- HERO SECTION ---------------------------->
  <section class="py-5 contact_us">
    <div class="container-lg h-100 d-flex flex-column justify-content-center text-center text-md-start">
      {{-- <h1 class="text-white contact_header fw-bold text-center">{{ $service->title }}</h1> --}}
      <h1 class="text-white contact_sub_header fw-bold">{{ $service->title }}</h1>
    </div>
  </section>
  <div class="bg1">
    <div class="container contt">
      <div class="row">
        {{-- <div class="col-lg-10 we-create mt-5">
          <h1>
            Your Technology Partner for <span>Business Excellence</span>
        </h1> --}}
        <p class="mt-5 pt-5 col-lg-10" style="
            font-family: Inter;
            font-size:36px;
            font-weight: 700;
        ">
            {{ $service->summary }}
        </p>
          
          <p class="col-lg-9 mb-5" style="
            font-size: 16px;
            font-family: Manrope;
            font-weight: 400;
            line-height: 140%;
            display: flex;
            align-items: center;
            color: #505C65;
          ">
            {!! nl2br($service->content) !!}
          </p>
        </div>
      </div>
    </div>
  </div>
    @component('components.scale')
    
    @endcomponent
@endsection