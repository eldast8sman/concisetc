@extends('layouts.app')

@section('title')
    {{ $project->title }}
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('css/projectscreen2.css') }}" />
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
  <section class="py-5 ps2_hero_section">
    <div class="container-lg py-3 h-100 text-center">
      <h1 class="display-4 mb-3 text-white">{{ $project->title }}</h1>
      <p class="text-white">{{ $project->summary }}</p>
    </div>
  </section>

  <!-------------------- PROBLEM SECTION ----------------------->
  <section class="py-5 problem_section ">
    <div class="container">
      <div class="row py-4 px-2 p-lg-3 p-xl-5 overflow-hidden bg-white problem_section_cont gx-lg-3">
        <div class="col-lg-6 mt-0 mb-3 mb-lg-0">
          <div class="p-3 problem_content_cont">
            <h4 class="mb-3">Problem</h4>
            <p>{{ $project->problem }}</p>
          </div>
        </div>
        <div class="col-lg-6 mt-0 ">
          <div class="p-3 problem_content_cont">
            <h4 class="mb-3">Solution Provided</h4>
            <p>{{ $project->solution }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 conclusion_section">
    <div class="container p-3 p-lg-5 conclusion_gradient_cont">
      <h4 class="mb-3 text-white">Conclusion and Next Steps</h4>
      <p class="text-white">{{ $project->conclusion }}</p>
    </div>
  </section>

  @component('components.scale')
      
  @endcomponent
@endsection