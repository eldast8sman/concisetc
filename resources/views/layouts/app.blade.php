<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--Bootstrap CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <!-- Project CSS -->
  <link rel="stylesheet" href="{{ asset("css/style.css") }}" />
  <link rel="stylesheet" href="{{ asset("css/general.css") }}" />
  <title>Concise || @yield('title')</title>
</head>

<body>
  <!---------------------------- NAVBAR ---------------------------->
  <nav class="navbar sticky-top navbar-expand-lg pro_nav">
    <div class="container-fluid">
      <a class="navbar-brand me-auto logo_cont" href="#"><img src="imgs/logo.svg" alt="concise logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about-us"><small>About</small></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services"><small>Services</small></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="projectscreen1.html">
              <small> Our Work</small>
            </a>
          </li>
          <li class="nav-item me-2 mb-2 mb-lg-0">
            <a class="nav-link" href="bloglist.html"><small>Blog</small></a>
          </li>
          <li class="d-flex">
            <a href="contact.html" class="nav-link gradient_btn">
              <small>CONTACT</small>
            </a href="contact.html">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-------------------- READY TO TAKE SECTION ----------------------->
  <section class="py-5 ready_to_take">
    <div class="container-lg text-center">
      <h1 class="m-auto lh-sm">
        Ready to scale up & boost your ROI with software solutions?
      </h1>
      <p class="mx-auto mb-4 my-sm-3">
        We've got an experienced & dedicated team of experts ready to kickstart a conversation about your software needs.
      </p>
      <button class="butn">Contact us to get started!</button>
    </div>
  </section>

  <!----------------------- Footer Section ---------------------------->
  <footer class="bd-footer py-4 py-md-5 footer_sect">
    <div class="container overflow-hidden">
      <div class="mt-3 mb-4"><img src="imgs/logo.svg" alt="concise logo" /></div>
      <div class="row gx-5 footer_row">
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <div class="">
            <h6 class="mb-3">LEARN MORE</h6>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="bloglist.html">Blog</a>
              </li>
              <li class="mb-2">
                <a href="aboutUs.html">About Us</a>
              </li>
              <li class="mb-2">
                <a href="contact.html">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <div>
            <h6 class="mb-3">COMPANY</h6>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="index.html#services">Services</a>
              </li>
              <li class="mb-2">
                <a href="aboutUs.html#teams">Our Team</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-10 col-sm-8 col-md-3 col-lg-2">
          <div>
            <h6 class="mb-3">FOLLOW US</h6>
            <div class="row gy-2">
              <div class="col-2 col-md-4">
                <a href="#" class="socials_cont">
                  <img src="imgs/socials/linkedin.svg" alt="linkedin logo" />
                </a>
              </div>
              <div class="col-2 col-md-4">
                <a href="#" class="socials_cont">
                  <img src="imgs/socials/instagram.svg" alt="instagram logo" />
                </a>
              </div>
              <div class="col-2 col-md-4">
                <a href="#" class="socials_cont">
                  <img src="imgs/socials/facebook.svg" alt="facebook logo" />
                </a>
              </div>
              <div class="col-2 col-md-4">
                <a href="#" class="socials_cont">
                  <img src="imgs/socials/twitter.svg" alt="twitter logo" />
                </a>
              </div>
              <div class="col-4">
                <a href="#" class="socials_cont">
                  <img src="imgs/socials/youtube.svg" alt="youtube logo" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 mt-4 mt-sm-4 mt-md-3 mt-lg-0 mb-3">
          <div>
            <h6 class="mb-3">COMPANY</h6>
            <p class="mb-3 f_text">
              Stay up to date with our latest trends and articles on solutions
              we create
            </p>
            <form action="#" method="get" class="mb-2 footer_form">
              <input type="Email" placeholder="Email Address" required />
              <button class="d-block mt-3 gradient_btn">
                <small>SUBSCRIBE</small>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="f_hr mb-3 mt-3"></div>
      <div class="d-flex flex-column flex-sm-row f_copywrite">
        <p class="me-4 mb-1"><span>&COPY;</span> {{ date('Y') }} Concise Software Solutions</p>
        <ul class="list-unstyled d-flex">
          <li class="me-3 me-sm-4">
            <a href="bloglist.html">Blog</a>
          </li>
          <li>
            <a href="aboutUs.html">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <!--Bootstrap JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</body>

</html>