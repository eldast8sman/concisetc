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
          
          <p class="col-lg-9 mb-5 pb-5" style="
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

  @if (!empty($service->filename))
    <div class="container mb-5 pb-5">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ $service->filename }}" alt="{{ $service->title }}" class="col-12">
        </div>
        <div class="col-md-6 pl-4" style="
        font-family: 'Manrope';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        display: flex;
        align-items: center;
      ">
          <p>{!! nl2br($service->solution) !!}</p>
        </div>
      </div>
    </div>
  @else
      <div class="container mb-5 pb-5">
        <div class="row">
          <div class="col-md-9 mx-auto rounded p-3" style="background-color: var(--primary-1000); color: #FFF">
            <p class="m-3" style="
            font-family: 'Manrope';
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            display: flex;
            align-items: center;
          ">{!! nl2br($service->solution) !!}</p>
          </div>
        </div>
      </div>
  @endif

  @if (!empty($projects))
      <!-------------------- WORKS SECTION ----------------------->
  <section class="py-5 works_section" id="works">
    <div class="container-lg">
      <div class="row justify-content-center g-3">
        @foreach ($projects as $project)
        <div class="col-12 col-md-6">
            <a href="{{ env('APP_URL') }}/our-work/{{ $project->slug }}"  class="card border-0">
              <div class="w-100 works_img_cont works_img_cont1" style="
                    background-image: url({{ $project->filename }});
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center center;
                "></div>
              <div class="card-body ps-0">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text project_desc">
                  {{ $project->summary }}
                </p>
              </div>
            </a>
          </div>    
        @endforeach
      </div>
    </div>
  </section>
  @endif
    @component('components.scale')
    
    @endcomponent
@endsection