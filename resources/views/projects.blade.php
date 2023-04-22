@extends('layouts.app')

@section('title')
    Our Work
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('css/projectscreen1.css') }}" />
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
    <section class="py-5 contact_us">
      <div class="container-lg h-100 d-flex flex-column justify-content-center text-center text-md-start">

          <h1 class="contact_header">Have an inquiry?</h1>
          <h1 class="contact_sub_header" style="color: #f2f7fb;">Works</h1>

      </div>
  </section>

    <!-------------------- SOLUTIONS SECTION ----------------------->
    @if ((empty($_GET['page']) || $_GET['page'] < 2) && empty($_GET['filter']))
    <div class="bg1">
      <div class="col-lg-11 mx-auto contt">
        <div class="row">
          <div class="col-lg-9 we-create we-creating mt-5">
            <h1 class="we_create_h1">
              We create <span>solutions</span> that makes
                running
                business
                <span>easier and quicker</span>
            </h1>
            
            <p class="mb-3">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna blandit tortor elit eget vitae odio non.
              Morbi
              massa eget consectetur in senectus aliquet. Tempus praesent vitae proin eu nulla. Quam cursus lacinia
              donec
              lorem blandit integer. Interdum arcu est quis blandit dolor risus facilisi ac. Sapien dui eu dictum id
              auctor.
              Consectetur bibendum tellus ut interdum. Sit nulla viverra ornare odio ixn at nisi.
            </p>
            <p class="mb-2">Porttitor a vitae sem a auctor. Enim quis maecenas velit eget eget neque tellus
              placerat.Orci, arcu habitant augue erat dignissim. Ut eget urna, adipiscing enim in nisi eleifend. Elit
              fames nisl,
              ornare
              senectus aliquet in in.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-------------------- GRAPH SECTION ----------------------->
  <section class="graph_section">
  </section>

    @endif

  
  <!-------------------- TAGS SECTION ----------------------->
  <section class="pt-5 tags_section">
    <div class="container-lg d-flex flex-column flex-md-row text-md-center align-items-md-center">
        @if (isset($_GET['filter']) && !empty($_GET['filter']))
            <a class="tags_a" href="{{ env('APP_URL') }}/our-work">All</a>
        @else
            <a class="tags_all" href="{{ env('APP_URL') }}/our-work">All</a>
        @endif

        @foreach ($filters as $filter)
            @if (isset($_GET['filter']) && $_GET['filter'] == $filter)
                <a class="tags_all" href="{{ env('APP_URL') }}/our-work?filter={{ urlencode($filter) }}">{{ $filter }}</a>
            @else
                <a class="tags_a" href="{{ env('APP_URL') }}/our-work?filter={{ urlencode($filter) }}">{{ $filter }}</a>
            @endif
        @endforeach
    </div>
  </section>

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

  @component('components.scale')
      
  @endcomponent
@endsection