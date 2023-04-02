@extends('layouts.app')

@section('title')
    Our Work
@endsection

@section('other_css')
    <link rel="stylesheet" href="css/projectscreen1.css" />
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
    <section class="py-5 ps1_hero_section">
        <div class="container-lg h-100 d-flex flex-column justify-content-center text-center text-md-start">
        <h1 class="display-4 ps1_hero_header1">Have an enquiry?</h1>
        <h1 class="display-4 ps1_hero_header2">Works</h1>
        </div>
    </section>

    <!-------------------- SOLUTIONS SECTION ----------------------->
  <section class="py-5 overflow-hidden solutions_section ">
    <div class="container-lg text-center text-lg-start">
      <div class="row">
        <div class="col-12 col-lg-10 col-xxl-9">
          <div>
            <h2 class="mb-4 display-5 solutions_section_header">We create <span>solutions</span> that makes <br>
              running
              business
              <span>easier and quicker</span>
            </h2>
          </div>
        </div>
        <div class="col-12 col-lg-7 col-xxl-7">
          <div class="solutions_text">
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
              senectus aliquet in in.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-------------------- TAGS SECTION ----------------------->
  <section class="pt-5 tags_section" id="work_tags">
    <div class="container-lg d-flex flex-column flex-md-row text-md-center align-items-md-center">
        @if (isset($_GET['filter']) && !empty($_GET['filter']))
            <a class="tags_a" href="{{ env('APP_URL') }}/our-work">All</a>
        @else
            <a class="tags_all" href="{{ env('APP_URL') }}/our-work">All</a>
        @endif

        @foreach ($filters as $filter)
            @if (isset($_GET['filter']) && $_GET['filter'] == $filter)
                <a class="tags_all" href="{{ env('APP_URL') }}/our-work?filter={{ $filter }}#work_tags">{{ $filter }}</a>
            @else
                <a class="tags_a" href="{{ env('APP_URL') }}/our-work?filter={{ $filter }}#work_tags">{{ $filter }}</a>
            @endif
        @endforeach
    </div>
  </section>

  @component('components.scale')
      
  @endcomponent
@endsection