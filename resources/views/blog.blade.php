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
            <a class="home" href="a">Home</a>
            <img src="imgs/bloglist/chevron forward.svg" alt="">
            <a class="blog" href="a">Blog</a>
          </div>
          <div class="inner-link2">
            <a href="a">/ Race Ratings: What you get & How to use rated prices</a>
          </div>

        </div>


        <div>
          <div class="p-2 container-div">
            <div>
              <h1 class="mt-3 mb-4">
                Race Ratings: What you get & How to use rated prices
              </h1>
            </div>

            <div class="inner-link3">
              <a class="home" href="a">Author</a>
              <img src="imgs/bloglist/separator.svg" alt="">
              July 27, 2022
            </div>

            <div class="img mt-3 mb-3">
              <img src="imgs/bloglist/Frame 48095701.png" alt="">
            </div>

            <div class="p">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facilisis nisi, et
                pellentesque ultrices aliquam. Sem sodales sit aenean consequat. Sit tristique
                varius at facilisis amet. Urna eget maecenas ullamcorper est purus. Pellentesque
                a consectetur malesuada et tincidunt dictumst pretium nibh integer. Gravida justo
                pulvinar blandit id nibh morbi in faucibus augue. Ac posuere in aliquet netus.
                Cras id egestas nunc velit massa eget viverra sem semper. Fringilla condimentum et
                senectus nisl, vitae tincidunt dis tempus habitant. Ipsum diam eu, convallis luctus
                sed scelerisque fermentum nullam. Feugiat risus ante faucibus interdum semper
                mattis viverra pulvinar. Dolor in netus dis tincidunt condimentum vestibulum sed
                nisi, lectus. Venenatis pretium ligula massa venenatis venenatis ornare condimentum.
                Hendrerit bibendum quam vestibulum viverra nisl amet, ut purus.

              </p>
              <p>
                Non in elit convallis elit vitae. Sed ullamcorper quis nunc gravida libero aliquam,
                auctor. Egestas in lacus, dui sociis libero adipiscing. At ac egestas in vitae, cursus
                fames eu turpis quam. Duis sit at metus mi risus pharetra felis fames consequat.
                Et nibh ultricies in elit. Semper sit placerat tempor tristique euismod bibendum.
                Faucibus elit sagittis ac id a nam morbi sed. Orci tristique id amet mattis. Nulla
                dolor fringilla condimentum ac feugiat risus nec. Erat enim amet arcu, dignissim
                habitant sit ut sed. Sed leo, amet augue vulputate tellus aliquet pharetra. In turpis
                mauris suspendisse diam, viverra. Massa magna lacinia bibendum lorem consectetur a
                convallis egestas. Egestas mollis adipiscing congue sit elit. Sit mauris convallis
                tincidunt sed mus. Feugiat amet, eget tristique sem tellus quis amet vel. Auctor
                consectetur augue imperdiet nunc feugiat neque ullamcorper. Libero nunc, tincidunt
                at hac. Vitae nisi, vulputate facilisis sed purus maecenas.
              </p>
              <p>
                Non in elit convallis elit vitae. Sed ullamcorper quis nunc gravida libero aliquam,
                auctor. Egestas in lacus, dui sociis libero adipiscing. At ac egestas in vitae,
                cursus fames eu turpis quam. Duis sit at metus mi risus pharetra felis fames
                consequat.
                Et nibh ultricies in elit. Semper sit placerat tempor tristique euismod bibendum.
                Faucibus elit sagittis ac id a nam morbi sed. Orci tristique id amet mattis. Nulla
                dolor fringilla condimentum ac feugiat risus nec. Erat enim amet arcu, dignissim
                habitant sit ut sed. Sed leo, amet augue vulputate tellus aliquet pharetra. In
                turpis mauris suspendisse diam, viverra. Massa magna lacinia bibendum lorem
                consectetur a convallis egestas. Egestas mollis adipiscing congue sit elit. Sit
                mauris convallis tincidunt sed mus. Feugiat amet, eget tristique sem tellus quis
                amet vel. Auctor consectetur augue imperdiet nunc feugiat neque ullamcorper. Libero
                nunc, tincidunt at hac. Vitae nisi, vulputate facilisis sed purus maecenas.
              </p>
              <p>
                Non in elit convallis elit vitae. Sed ullamcorper quis nunc gravida libero aliquam,
                auctor. Egestas in lacus, dui sociis libero adipiscing. At ac egestas in vitae,
                cursus fames eu turpis quam. Duis sit at metus mi risus pharetra felis fames
                consequat.
                Et nibh ultricies in elit. Semper sit placerat tempor tristique euismod bibendum.
                Faucibus elit sagittis ac id a nam morbi sed. Orci tristique id amet mattis. Nulla
                dolor fringilla condimentum ac feugiat risus nec. Erat enim amet arcu, dignissim
                habitant sit ut sed. Sed leo, amet augue vulputate tellus aliquet pharetra. In
                turpis mauris suspendisse diam, viverra. Massa magna lacinia bibendum lorem
                consectetur a convallis egestas. Egestas mollis adipiscing congue sit elit. Sit
                mauris convallis tincidunt sed mus. Feugiat amet, eget tristique sem tellus quis
                amet vel. Auctor consectetur augue imperdiet nunc feugiat neque ullamcorper. Libero
                nunc, tincidunt at hac. Vitae nisi, vulputate facilisis sed purus maecenas.
              </p>

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

        <div class="flex-view">
          <img class=" mt-1" src="imgs/bloglist/Thumnail-1.png" alt="image of paris">
          <div class="ms-2 area">
            <p class="date mt-3 -2">March 05, 2021</p>
            <h3 class="head">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
            <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
              tincidunt
              ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
            </p>
          </div>
        </div>

        <div class="flex-view">
          <img class=" mt-1" src="imgs/bloglist/Thumnail-1.png" alt="image of paris">
          <div class="ms-2">
            <p class="date mt-3 -2">March 05, 2021</p>
            <h3 class="head">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
            <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
              tincidunt
              ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
            </p>
          </div>
        </div>
        <div class="flex-view">
          <img class=" mt-1" src="imgs/bloglist/Thumnail-1.png" alt="image of paris">
          <div class="ms-2">
            <p class="date mt-3 -2">March 05, 2021</p>
            <h3 class="head">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
            <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
              tincidunt
              ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
            </p>
          </div>
        </div>

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
@endsection