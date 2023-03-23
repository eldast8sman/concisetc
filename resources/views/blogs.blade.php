@extends('layouts.app')

@section('title')
    Blogs
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
  <section class="py-5 contact_us">
    <div class="container-lg h-100 d-flex flex-column justify-content-center text-center text-md-start">
      <h1 class="text-white contact_header fw-bold">Read our updated contents!</h1>
      <h1 class="text-white contact_sub_header fw-bold">Blog</h1>
    </div>
  </section>

  <!-------------------- SETTING YOUR BUSSINESS ----------------------->
  <div class="container ">
    <div class="row blog">
      <div class="col-lg-6">
        <div class="blog-img ">
          <img class=" d-flex justify-content-start" src="{{ $first_blog->filename }}" alt="{{ $first_blog->title }}">
        </div>
      </div>
      <div class="col-lg-6 ">
        <div class="date1 d-flex justify-content-center">
          {{ $first_blog->publication_date }}
        </div>
        <div class="blog-text-h1 h1">
          {{ $first_blog->title }}
        </div>
        <div>
          <p class="blog-text-p">
            {{ $first_blog->summary }}
          </p>
        </div>
      </div>
    </div>
  </div>


  <div class="container bloglist mt-5">
    <div class="row">
      <div class="col-lg-12 bloglist-head">
        <p>Latest Post</p>
      </div>
    </div>
    <div class="row">

      @foreach ($blogs as $blog)
      <a href="{{ env('APP_URL') }}/blogs/{{ $blog->slug }}"  class="col-lg-4 mb-5 flex-view">
        <div style="
          background-image: url({{ $blog->filename }});
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center center
        "><img src="{{ $blog->filename }}" alt="{{ $blog->title }}" height="250px" style="opacity: 0"></div>
        <div class="flex">
          <p class="date mt-3 mb-3.5">{{ $blog->publication_date }}</p>
          <h3 class="head">{{ $blog->title }}</h3>
          <p class="text mb-4">
            {{ $blog->summary }}
          </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>

  <div class="container d-flex justify-content-center mt-5 mb-5 buttn-cont">
    <button class="buttn">LOAD MORE</button>
  </div>
@endsection