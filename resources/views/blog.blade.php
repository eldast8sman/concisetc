@extends('layouts.app')

@section('title')
    {{ $blog->title }}
@endsection

@section('content')
<div class="container">
    <div class="row blogpage">
      <div class="col-lg-8 mt-4 ">
        <div class="link p-2 mb-3">
          <div class="mb-2 ms-2 inner-link">
            <a class="home" href="{{ env('APP_URL') }}">Home</a>
            <span class="blog">&gt;</span>
            {{-- <img src="imgs/bloglist/chevron_forward.svg" alt=""> --}}
            <a class="blog" href="{{ env('APP_URL') }}/blogs">Blog</a>
          </div>
          <div class="inner-link2">
            <span>/ {{ $blog->title }}</span>
          </div>

        </div>


        <div>
          <div class="p-2 container-div">
            <div>
              <h1 class="mt-3 mb-4">
                {{ $blog->title }}
              </h1>
            </div>

            <div class="inner-link3">
              <p class="home">
                <span class="blog_author">{{ $blog->author }}</span>
                <span class="blog_date">{{ $blog->publication_date }}</span>
              </p>
            </div>

            <div class="img mt-3 mb-3">
              <img src="{{ $blog->filename }}" alt="{{ $blog->title }}" style="height: auto">
            </div>

            <div>
              {!! html_entity_decode($blog->body) !!}
            </div>


          </div>
        </div>


        <div class="discussion col-11 mt-4">
          <h3 class="">
            Discussion (0)
          </h3>
          <textarea class="mt-2 p-2 textarea" placeholder="Add to discussion..." name="discussion" id="discussion"
            cols="95" rows="4"></textarea>

          <div class=" d-flex mt-2">
            <button class="buttn">LOAD MORE</button>
          </div>

        </div>

      </div>



      <div class="col-lg-4 blogpage2 mt-5">

        <div class="blogpage2-head">
          <p>Related post</p>
        </div>

        @foreach ($blogs as $oblog)
            <div class="flex-view mb-4">
                <div class="col-12" style="
                  background-image: url({{ $oblog->filename }});
                  background-size: contain;
                  background-position: center center;
                  background-repeat: no-repeat;
                  height:200px
                ">
                  <img class=" mt-1" src="{{ $oblog->filename }}" alt="{{ $oblog->title }}" height="200px" style="opacity: 0">
                </div>
                <div class="ms-2 area">
                <p class="date mt-3 -2">{{ $oblog->publication_date }}</p>
                <h3 class="head" style="height:auto">{{ $oblog->title }}</h3>
                <p class="text" style="height:auto">
                    {{ $oblog->summary }}
                </p>
                </div>
            </div>
        @endforeach

        <div class="form p-3 mt-5">
          <p>Stay up to date with our latest trends and articles on solutions we create</p>
          <input class="p-2 mt-3" type="text" placeholder="Name" id="Name">
          <div class=" d-flex mt-2">
            <button class="buttn mt-2">Subscribe to mail list</button>
          </div>
        </div>


      </div>
    </div>

  </div>
  @component('components.scale')
      
  @endcomponent
@endsection