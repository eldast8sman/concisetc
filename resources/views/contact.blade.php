@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <!---------------------------- HERO SECTION ---------------------------->
    <section class="py-5 contact_us">
        <div class="container-lg h-100 py-5 text-start ">

            <h1 class="text-white contact_header fw-bold">Have an inquiry?</h1>
            <h1 class="contact_sub_header text-white fw-bolder">Contact Us</h1>

        </div>
    </section>

    <!-------------------- PARTNERS SECTION ----------------------->
    <section class="py-5 contact-card-bg bg-danger" id="form-sect">
        <div
            class="container d-flex flex-column justify-content-between flex-lg-row justify-content-lg-between align-items-lg-center">
            <div class="col-lg-6">
                <!-- header -->
                <div>

                    <h1 class="fw-bold header">Get in touch</h1>
                    <p class="my-4 w-75">Give us a call or drop by anytime, we endeavour to answer all enquiries within
                        24
                        hours
                        on
                        business
                        days. We will be happy to answer your questions.</p>
                </div>
                <!-- contact -->
                <div class="px-4">
                    <div class="d-flex justify-content-start mt-5">
                        <span class="d-inline-block py-3 px-3 icon-bg rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-envelope text-white" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </span>
                        <span class="d-flex flex-column justify-content-evenly ms-3">
                            <small class="block fs-6 fw-semibold">Email</small>
                            <small class="block fs-6 ">info@concisesoftwaresolutions.com</small>
                        </span>

                    </div>
                    <div class="d-flex my-4 justify-content-start w-100 my-5">
                        <span class="d-inline-block py-3 px-3 icon-bg rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-envelope text-white" fill="currentColor" class="bi bi-phone"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>
                        </span>
                        <span class="d-flex flex-column justify-content-evenly ms-3">
                            <small class="block fs-6 fw-semibold">Phone Number</small>
                            <small class="block fs-6 ">+1-704-755-5312, +1-704-755-5312</small>
                        </span>

                    </div>
                    <div class="d-flex justify-content-start w-100">
                        <span class="d-inline-block py-3 icon-bg px-3  rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-geo-alt text-white" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </span>
                        <span class="d-flex flex-column justify-content-evenly ms-3">
                            <small class="block fs-6 fw-semibold">Address</small>
                            <small class="block fs-6 ">101 S Tryon St Suite 2700, Charlotte, NC 28280</small>
                        </span>

                    </div>
                </div>
            </div>
            <div class="mt-5 mt-lg-0 pt-5 pt-lg-0 col-lg-6">
                <form class="w-100 px-3 rounded pt-2 px-lg-5 shadow " id="form">
                    <div class='form-header py-4 mb-5'>
                        <h1>Send us a message</h1>
                        <p>Your email is safe with us.</p>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="full-name" class="py-1">Full Name</label>
                        <input type="text" class="w-100 py-3 px-2 my-1 rounded border-0" id="name" name="full-name"
                            placeholder="John Doe" required />
                    </div>
                    <div>
                        <label for="email" class="py-1 mt-1">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com"
                            class="w-100 py-3 my-1 rounded px-2" required />
                    </div>
                    <div>
                        <label for="email" class="py-1 mt-1">What are you interested in?</label>
                        <select id="interest" class="w-100 py-3 px-2 my-1 rounded border-0">
                            <option>Choose an option</option>
                        </select>
                    </div>
                    {{-- <div>
                        <label for="email" class="py-1 px-2 mt-1">What are you interested in?</label>
                        <select class="w-100 py-3 px-2 my-1 rounded border-0">
                            <option>Choose an option</option>
                        </select>
                    </div> --}}
                    <div>
                        <label for="email" class="py-1 mt-1">Message</label>
                        <textarea id="message" class="w-100 py-2 px-3 my-1 rounded border-0" name="" id="" cols="30" rows="10"
                            placeholder="Let know us about your projects?"></textarea>
                    </div>
                    <div class="w-100 mt-2">
                        <button type="submit" class="py-3 w-100 border-0 rounded" id="send_message">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection