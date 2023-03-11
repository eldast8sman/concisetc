@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
  <!---------------------------- HERO SECTION ---------------------------->
  <section class="py-0 py-md-5 hero_section">
    <div class="container-md py-5 text-center text-md-start">
      <h1 class="display-4 hero_we">Your Technology Partner for Business Excellence</h1>
      <h1 class="display-4 hero_simplified">Improving Business Efficiency through Innovative Technology &</h1>
      <h1 class="display-4 hero_you">Custom Software Solutions for the Construction Industry</h1>
      <div class="row">
        <p class="col col-md-6 text-center text-md-start my-3">
            We're a B2B software solutions agency that's committed to helping the construction industry, school districts,
            and government in building and deploying custom, best-of-breed software solutions to enhance processes and improve productivity.
        </p>
      </div>
      <div class="mb-md-5">

        <button class="mt-2 me-3 buttn">GET STARTED</button>
        {{-- <button class="mt-2 gradient_btn gradient_btn_find">FIND OUT MORE</button> --}}
      </div>
    </div>
  </section>

  <!-------------------- PARTNERS SECTION ----------------------->
  <section class="py-5 partners_section">
    <div class="container-md">
      <div class="row g-2 justify-content-center align-items-center">
        <div class="col-6 col-sm-4 col-md-2 ">
          <div class="m-auto partner_logo_cont">
            <img class="img-fluid" src="imgs/seo.svg" alt="partner-logo" />
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2 ">
          <div class="m-auto partner_logo_cont">
            <img class="img-fluid" src="imgs/seo.svg" alt="partner-logo" />
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2 ">
          <div class="m-auto partner_logo_cont">
            <img class="img-fluid" src="imgs/seo.svg" alt="partner-logo" />
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2 ">
          <div class="m-auto partner_logo_cont">
            <img class="img-fluid" src="imgs/seo.svg" alt="partner-logo" />
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2 ">
          <div class="m-auto partner_logo_cont">
            <img class="img-fluid" src="imgs/seo.svg" alt="partner-logo" />
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-2 ">
          <div class="m-auto partner_logo_cont">
            <img class="img-fluid" src="imgs/seo.svg" alt="partner-logo" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-------------------- SERVICES SECTION ----------------------->
  <section class="py-5 text-center services_section" id="services">
    <div class="container-lg">
      <p class="mb-0 small_header">Our Services</p>
      <h2 class="mt-1 mb-4 big_header">Custom software solutions, specially built for you</h2>

      <div class="container-fluid px-sm-5 px-md-1 px-lg-5 text-center">
        <div class="row g-3">
          
          <div class="col-12 col-md-6">
            <div class="pt-3 pb-1 px-2 services_col ">
              <div class="services_icon_cont">
                <img src="imgs/services/bus.svg" alt="bus icon" />
              </div>
              <h5 class="my-3">Logistic Solutions</h5>
              <p class="mx-lg-4">
                Manage every aspect – from GPS tracking to pickups & delivery notifications, reporting, payroll, and billing – of your
                trucking and logistics services right from a single dashboard. We provide custom management systems, you run the operations.
                <br>
                <br>
              </p>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pt-3 pb-1 px-2 services_col ">
              <div class="services_icon_cont">
                <img src="imgs/services/utility.svg" alt="utility icon" />
              </div>
              <h5 class="my-3">School District Solutions</h5>
              <p class="mx-lg-4">
                Let's help you make education better by improving internal communications and document sharing within the parent/teacher community through
                customized and ready-to-use web/mobile dashboards. Have all stakeholders communicate remotely and from a secured digital space.
              </p>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pt-3 pb-1 px-2 services_col ">
              <div class="services_icon_cont">
                <img src="imgs/services/code.svg" alt="code icon" />
              </div>
              <h5 class="my-3">Construction Software Development</h5>
              <p class="mx-lg-4">
                Develop and enjoy user-friendly custom software solutions specially built for your construction business.
                Address your clients' needs in real-time by building custom, web/mobile platforms that make doing business with you seamless.
                Our custom construction industry software development solutions serve your clients' best interests without neglecting your business needs.
              </p>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pt-3 pb-1 px-2 services_col ">
              <div class="services_icon_cont">
                <img src="imgs/services/code.svg" alt="code icon" />
              </div>
              <h5 class="my-3">Customized Construction Websites and Mobile App Development</h5>
              <p class="mx-lg-4">
                Your website/app is the first point of contact for most of your clients. The first impression does matter.
                Employ our expertise to build fully responsive, well-optimized, and user-friendly websites & mobile applications with
                custom features that are tailored just for your construction business.
              </p>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="pt-3 pb-1 px-2 services_col ">
              <div class="services_icon_cont">
                <img src="imgs/services/hammer.svg" alt="hammer icon" />
              </div>
              <h5 class="my-3">Minority Program Management Tools</h5>
              <p class="mx-lg-4">
                Let's help you scale your business, giving you a level playing ground,and an edge over your competitors by providing the
                tools and support that you need to deliver amazing construction projects.
                <br /><br />
                Enhance productivity by working with our all-in-one, one-of-a-kind dashboard, which makes procurement and reporting easier.
                Enhance interaction amongst your stakeholders – subcontractors, program managers, & team members – effective collaboration
                from one single space. Monitor every aspect of your construction project from start to finish, in real-time, and from one single dashboard.
                Increase efficiency by adopting the use of customized reporting dashboards, and interactive platforms, built just for your team.
              </p>
            </div>
          </div>


          {{-- <div class="col-12 col-md-6">
            <div class="pt-3 pb-1 px-2 services_col ">
              <div class="services_icon_cont">
                <img src="imgs/services/utility.svg" alt="utility icon" />
              </div>
              <h5 class="my-3">Website & Mobile App Development</h5>
              <p class="mx-lg-4">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna aliquam erat volutpat.
              </p>
            </div>
          </div> --}}
        </div>
      </div>

    </div>
  </section>

  <!-------------------- WORKS SECTION ----------------------->
  <section class="py-5 works_section" id="works">
    <div class="container-lg">
      <p class="mb-0 text-center small_header">Our Works</p>
      <h2 class="mt-1 text-center big_header">
        We pride ourselves on delivering the very best custom software solutions. What you see you believe: browse through our portfolio for an overview.
      </h2>
      <div class="row px-lg-5 gx-2 g-md-1 mt-4 mb-3 justify-content-center text-center">
        <div class=" col-6 col-md-3 d-flex flex-column align-items-center">
          <h3 class="display-5 mb-0">30+</h3>
          <p class="lead mt-0">Clients</p>
        </div>
        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
          <h3 class="display-5 mb-0">10+</h3>
          <p class="lead mt-0">Solution Provided</p>
        </div>
        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
          <h3 class="display-5 mb-0">$5M+</h3>
          <p class="lead mt-0">Saved</p>
        </div>
        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
          <h3 class="display-5 mb-0">100+</h3>
          <p class="lead mt-0">Hours</p>
        </div>
      </div>

      <div class="row justify-content-center g-3">
        <div class="col-12 col-md-6">
          <a href="projectscreen2.html"  class="card border-0">
            <div class="w-100 works_img_cont works_img_cont1"></div>
            <div class="card-body ps-0">
              <h5 class="card-title">Durham School</h5>
              <p class="card-text project_desc">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat. Ut wisi enim ad
              </p>
            </div>
          </a>
        </div>

        <div class="col-12 col-md-6">
          <a href="projectscreen2.html"  class="card border-0">
            <div class="w-100 works_img_cont works_img_cont2"></div>
            <div class="card-body ps-0">
              <h5 class="card-title">Lewis Companies</h5>
              <p class="card-text project_desc">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat. Ut wisi enim ad
              </p>
            </div>
          </a>
        </div>

        <div class="col-12 col-md-6">
          <a href="projectscreen2.html"  class="card border-0">
            <div class="w-100 works_img_cont works_img_cont3"></div>
            <div class="card-body ps-0">
              <h5 class="card-title">TRS & I Group</h5>
              <p class="card-text project_desc">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat. Ut wisi enim ad
              </p>
            </div>
          </a>
        </div>

        <div class="col-12 col-md-6">
          <a href="projectscreen2.html"  class="card border-0">
            <div class="w-100 works_img_cont works_img_cont4"></div>
            <div class="card-body ps-0">
              <h5 class="card-title">Silverback brothers</h5>
              <p class="card-text project_desc">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat. Ut wisi enim ad
              </p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-------------------- TESTIMONIALS SECTION ----------------------->
  <section class="py-5 testimonials_section">
    <div class="container-lg">
      <p class="mb-0 text-center small_header">Testimonials</p>
      <h2 class="mt-1 mb-5 text-center big_header">
        Our words are enough...but, we can offer you more. See what our clients are saying about our custom software development solutions
      </h2>

      <div class="d-flex flex-column flex-md-row mb-4 align-items-center justify-content-center">

        <div class="mb-3 mb-lg-0 testimonials_img_cont">
          <img class="" src="imgs/testimonials/girl.svg" alt="lady smiling" />
        </div>
        <div class="ms-md-4 text-center text-md-start position-relative t_text_cont">
          <p class="mb-4 t_text">
            “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            blandit vel sed sagittis. Scelerisque neque at elementum mi nulla.
            Morbi diam eu non ut augue. Mattis amet bibendum faucibus elit,
            tellus mi velit lacus. Ut dui ac tellus lectus enim euismod odio.
            Aliquet sodales vestibulum feugiat aliquam cras egestas varius
            habitasse integer. In.”
          </p>
          <small class="d-block mb-1 t_name">John Doe </small>
          <small class="d-block mb-3 mb-md-0 t_position"> Director - Lewiscompany.ai </small>

          <!-- ARROWS -->
          <div class="d-flex align-items-center  position-absolute top-100 end-0 arrows_cont">
            <div class="t_prev_arrow_cont">
              <img class="t_prev_arrow" src="imgs/testimonials/prev-arrow.svg" alt="arrow for previous">
            </div>
            <div class="ms-3 t_next_arrow_cont">
              <img class="t_next_arrow" src="imgs/testimonials/next-arrow.svg" alt="arrow for next">
            </div>
          </div>
        </div>

      </div>

      <!-- <div class="d-flex flex-column flex-md-row mb-4 align-items-center justify-content-center">
        <div class="testimonials_img_cont">
          <img class="img-fluid" src="imgs/testimonials/girl.svg" alt="lady smiling" />
        </div>
        <div class="mt-3 mt-md-0 ms-md-4 text-center text-md-start t_text_cont">
          <p class="mb-4 t_text">
            “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            blandit vel sed sagittis. Scelerisque neque at elementum mi nulla.
            Morbi diam eu non ut augue. Mattis amet bibendum faucibus elit,
            tellus mi velit lacus. Ut dui ac tellus lectus enim euismod odio.
            Aliquet sodales vestibulum feugiat aliquam cras egestas varius
            habitasse integer. In.”
          </p>
          <small class="d-block mb-1 t_name">John Doe </small>
          <small class="d-block t_position"> Director - Lewiscompany.ai </small>
          
        </div>
      </div> -->
    </div>
  </section>

  <!-------------------- MANTRA SECTION ----------------------->
  <section class="mantra_section py-5">
    <div class="container-lg">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-lg-7">
          <div>
            <h2 class="display-6 text-center text-lg-start mantra_heading">What We Believe and Stand For</h2>
            {{-- <p class="lead text-center text-lg-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem
              ipsum dolor sit
              amet,
              consectetur
              adipiscing
              elit.</p> --}}
            <div class="mt-4">
              <div class="d-flex align-items-center">
                <div class="me-4 mantra_hammer_cont">
                  <img src="imgs/mantra/hammer1.svg" alt="hammer icon">
                </div>
                <div>
                  <small class="d-block fw-bolder mantra_small_heading">Experience and Expertise</small>
                  <small class="d-block  mantra_text">We believe that every business deserves the best technology and cutting-edge software development solutions that accelerate growth.
                    To provide you with the best, we employ the most experienced hands, relying on our broad expertise, and in-depth knowledge.</small>
                </div>
              </div>
              <div class="d-flex my-4 align-items-center">
                <div class="me-4 mantra_hammer_cont">
                  <img src="imgs/mantra/hammer2.svg" alt="hammer icon">
                </div>
                <div>
                  <small class="d-block mantra_small_heading">Efficiency and Productivity</small>
                  <small class="d-block mantra_text">At Concise Software Solutions, our mission is to make doing business easier and better for you. We are here to help you boost efficiency
                    and productivity by providing accurate, reliable, and cost-effective custom software solutions that meet your business needs.</small>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div class="me-4 mantra_hammer_cont">
                  <img src="imgs/mantra/hammer3.svg" alt="hammer icon">
                </div>
                <div>
                  <small class="d-block mantra_small_heading">Client Support and Satisfaction</small>
                  <small class="d-block mantra_text">It's all about you. We stop at nothing to ensure that you are satisfied with our services. From consultation to technical assistance and 24/7 customer support,
                    we hold you by the hand and guide you through getting the most from your business, through innovative technology.</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block">
          <div class="mantra_hands_cont">
            <img class="img-fluid" src="imgs/mantra/hands.svg" alt="hands">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection