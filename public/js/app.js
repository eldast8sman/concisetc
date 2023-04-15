var BASE_URL = "http://127.0.0.1:8000/";
// var BASE_URL = "https://www.concise.cfcing.org/";
var API_URL = BASE_URL + "api/";

if($("div#image-wrapper")){
    $.ajax({
        type: "GET",
        url: API_URL+"testimonials",
        headers: {
            "Accept": "application/json"
        },
        success: function(response){
            const wrapper = document.querySelector('#image-wrapper')
            const data = response.data;

            const reviewSlideInfo = data?.map((review,id)=> {
                if($(window).width() > 450){
                    console.log("Greater");
                    return `<div class="slide">
                          <div class=" d-flex flex-column flex-lg-row align-items-center justify-content-center">
        
                            <div class="mb-3 mb-lg-0 testimonials_img_cont d-flex justify-content-center align-items-center">
                              <img class="" src='imgs/testimonials/format_quote.svg' width=100 height=130 alt="lady smiling" />
                              <div>
                                <img class="" src=${review?.filename} alt="${review?.name}" />
                              </div>
                            </div>
                            <div class="ms-md-4 text-center text-md-start t_text_cont">
                              <p class="mb-4 t_text">
                                "${review?.testimonial}"
                              </p>
                              <div>
                                <small class="d-block mb-1 t_name">${review?.name}</small>
                                <small class="d-block mb-3 mb-md-0 t_position">${review?.position}</small>
                              </div>
                            </div> 
                          </div>
                        </div>`
                } else {
                    return `<div class="slide">
                            <div class="ms-md-4 text-center text-md-start t_text_cont">
                              <p class="mb-4 t_text">
                                "${review?.testimonial}"
                              </p>
                              <div class="row mt-3">
                                <div style="width: 48px; height: 48px; background-image: url(${review?.filename}); background-size: cover; background-position: top center; border: 1px solid #A5CFEC; border-radius: 72px;">
                                   
                                </div>
                                <div class="col-9">
                                    <small class="d-block mb-1 t_name">${review?.name}</small>
                                    <small class="d-block mb-3 mb-md-0 t_position">${review?.position}</small>
                                </div>
                              </div>
                            </div> 
                          </div>
                        </div>`
                }
            }).join('')
            wrapper.insertAdjacentHTML("beforebegin",reviewSlideInfo)

            const allSlides = document.querySelectorAll('.slide');
            let curr = 1

            const ShowSlides = (n) => {
                if (n > allSlides.length) curr = 1
                if (n < 1) {curr = allSlides.length}
        
                allSlides.forEach((sl, i)=> {
                  allSlides[i].style.display = 'none'
                })
                allSlides[curr-1].style.display = 'block'
            }
            ShowSlides()

            const moveSlice =(n)=>{
                ShowSlides(curr+=n)
            }
    
            document.querySelector('.t_prev_arrow_cont').addEventListener('click',()=> moveSlice(-1),false)
            document.querySelector('.t_next_arrow_cont').addEventListener('click', ()=> moveSlice(1))
            document.querySelector('.t_prev_arrow_cont_md').addEventListener('click',()=> moveSlice(-1),false)
            document.querySelector('.t_next_arrow_cont_md').addEventListener('click', ()=> moveSlice(1))

            function self_move(){
                ShowSlides(curr+=1)
            }

            setInterval(self_move, 4000)
        },
        error: function(response){
            message = JSON.parse(response.responseText);
            console.log(message);
        }
    })
}

if($("button#load_blogs")){
    var page = 2;

    $("button#load_blogs").click(function(){
        $(".error_msg").remove();
        $.ajax({
            type: "GET",
            url: API_URL+"blogs?page="+page,
            headers: {
                "Accept": "application/json"
            },
            success: function(response){
                data = response.data;
                $.each(data, function(key, val){
                    output =    '<a href="'+BASE_URL+'/blogs/'+val.slug+'" class="col-lg-4 mb-5 flex-view">';
                    output +=       '<div style="background-image: url('+val.filename+'); background-size: contain; background-repeat: no-repeat; background-position: center center">';
                    output +=           '<img src="'+val.filename+'" alt="'+val.title+'" height="250px" style="opacity: 0"  />'
                    output +=       '</div>';
                    output +=       '<div class="flex">';
                    output +=           '<p class="date mt-3 mb-3.5">'+val.publication_date+'</p>';
                    output +=           '<h3 class="head">'+val.title+'</h3>';
                    output +=           '<p class="text mb-4">'+val.summary+'</p>';
                    output +=       '</div>';
                    output +=   '</a>';

                    $("div#blogs").append(output);
                });

                page += 1;
            },
            error: function(response){
                message = JSON.parse(response.responseText);
                $("button#load_blogs").after('<p class="error_msg text-danger">'+message.message+'</p>');
                console.log(message);
            }
        });
    });
}

$("button#send_message").on("click", function(){
    $(".error_message").remove();

    var name = $("input#name");
    var email = $("input#email");
    var interest = $("select#interest");
    var message = $("textarea#message");

    if((name.val() == "") || (email.val() == "") || (message.val() == "")){
        if(name.val() == ""){
            name.after('<p class="error_message text-danger">Name must be provided</p>');
        }
        if(email.val() == ""){
            email.after('<p class="error_message text-danger">Email must be provided</p>');
        }
        if(message.val() == ""){
            message.after('<p class="error_message text-danger">Can not send an empty Message</p>');
        }

        return false;
    } else {
        $("button#send_message").html("Sending...");
        var data = {
            "name": name,
            "email": email,
            "interest": interest,
            "message": message
        }

        $.ajax({
            type: "POST",
            url: API_URL+"send_message",
            data: data,
            headers: {
                "Accept": "application/json"
            },
            success: function(response){
                $("button#send_message").after('<p class="error_message text-primary">Message Sent</p>');
                $(".error_message").fadeOut(2000);
            },
            error: function(response){
                message = JSON.parse(response);
                $("button#send_message").after('<p class="error_message text-danger">'+message.message+'</p>');
                console.log(message);
            }
        });
        $("button#send_message").html('Send Message');
    }
});

$(".popup-gallery").magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] 
    }
});