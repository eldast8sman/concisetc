// var BASE_URL = "https://www.cfcing.org/";
var BASE_URL = "http://127.0.0.1:8000/";
var ADMIN_URL = BASE_URL + "dashboard/";
var API_URL = BASE_URL + "api/";

function html_encode(text) {
    return $("<textarea/>")
      .text(text)
      .html();
  }


$(".loginForm").submit(function(e) {
    e.preventDefault();

    var email = $('#email').val();
    var password = $("#password").val();
    if (email == "" || password == "") {
        var error_message = "";
        if (email == "") {
            error_message += "Email must be provided";
        }
        if (password == "") {
            error_message += "Password must be provided";
        }

        toaster_error(error_message)
    } else {
        var req = {
            "email": email,
            "password": password
        }
        $.ajax({
            type: "POST",
            url: API_URL + "login",
            data: req,
            dataType: "json",
            success: function(response) {
                if (response.status == "success") {
                    res = response.data;
                    localStorage.setItem("token", res.token);
                    localStorage.setItem("name", res.name);
                    localStorage.setItem("email", res.email);
                    toaster_success("Login was successful");

                    // console.log(localStorage);

                    window.location = "../dashboard"
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response) {
                toaster_error("Oops! Something went wrong "+response.responseText);
            }
        })
    }

});

$("a#dash_logout").click(function(e){
    e.preventDefault();

    toaster_success("Logging Out");

    $.ajax({
        type: "POST",
        url: API_URL+"logout",
        headers: {
            "Authorization": "Bearer "+localStorage.getItem('token'),
            "Content-Type": "application/json"
        },
        success: function(response){
            localStorage.setItem("token", "");
            localStorage.setItem("name", "");
            localStorage.setItem("email", "");
            toaster_success("Successfully Logged Out");

            window.location = BASE_URL+"dashboard";
        },
        error: function(response){
            console.log(response.responseText);
            toaster_error("Oops! "+response.responseText);
        }
    })
});

var team_forms = document.querySelectorAll(".team_form");
for(let i=0; i < team_forms.length; i++){
    var team_form = team_forms[i];

    team_form.onsubmit = function(e){
        e.preventDefault();

        var name = $("input#team_name").val();
        var position = $("input#team_position").val();
        var bio = $("textarea#team_bio").val();

        if((name == "") || (position == "") || (bio == "")){
            var error_message = "";
            if(name == ""){
                error_message += "Name must be provided! ";
            }
            if(position == ""){
                error_message += "Position must be provided! ";
            }
            if(bio == ""){
                error_message += "Bio must be provided! ";
            }
            toaster_error(error_message);
            return false;
        }

        var data_id = e.target.dataset['id'];
        if(data_id == ""){
            var url = API_URL+"teams"
        } else {
            var url = API_URL+"teams/"+data_id;
        }

        var fd = new FormData(e.target);

        $.ajax({
            type: "POST",
            url: url,
            data: fd,
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Accept": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    window.location = BASE_URL+"dashboard";
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                message = JSON.parse(response.responseText);
                toaster_error(message.message);
                console.log(message);
            }
        });
    }
}

var team_del_buttons = document.querySelectorAll(".delete_team");
for(let i=0; i<team_del_buttons.length; i++){
    del_button = team_del_buttons[i];

    del_button.onclick = function(e){
        var header_id = e.target.dataset['id'];

        $.ajax({
            type: "DELETE",
            url: API_URL+"teams/"+header_id,
            dataType: "json",
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Content-Type": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    toaster_success("Deleting Team Member...");

                    function redirect(){
                        window.location = BASE_URL+"dashboard";
                    }

                    setTimeout(redirect(), 2500);
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                var message = JSON.parse(response.responseText);
                console.log(message.message);
                toaster_error(message);
            }
        })
    }
}

$("form.blog_form").submit(function(e){
    e.preventDefault();

    var title = $("input#blog_title").val();
    var author = $("input#blog_author").val();
    var body = $("textarea#blog_bodu").val();
    var summary = $("textarea#blog_summary").val();
    var image_files = $('#image_upload')[0].files;
    var published = $("input#publication_date").val();
    var data_id = e.target.dataset['id'];

    if(data_id == ""){
        if((title == "") || (author == "") || (body == "") || (summary == "") || (published == "") || (image_files.length < 1)){
            var error_message = "";
            if(title == ""){
                error_message += "Article Title must be provided! ";
            }
            if(author == ""){
                error_message += "Author must be provided! ";
            }
            if(body == ""){
                error_message += "Blog's Body must be provided! ";
            }
            if(published == ""){
                error_message += "Blog's Publication Date must be provided! ";
            }
            if(image_files.length < 1){
                error_message += "Blog Photo must be uploaded! ";
            }
            if(summary == ""){
                error_message += "Blog's Summary must be provided"
            }
            toaster_error(error_message);
            return false;
        }

        var image_file = image_files[0].type;
        if((image_file != "image/jpg") && (image_file != "image/jpeg") && (image_file != "image/png")){
            toaster_error("Wrong Image Filetype");
            return false;
        }

        url = API_URL+"blogs";
    } else {
        if((title == "") || (author == "") || (body == "") || (summary == "") || (published == "")){
            var error_message = "";
            if(title == ""){
                error_message += "Article Title must be provided! ";
            }
            if(author == ""){
                error_message += "Author must be provided! ";
            }
            if(body == ""){
                error_message += "Blog's Body must be provided! ";
            }
            if(published == ""){
                error_message += "Blog's Publication Date must be provided! ";
            }
            if(summary == ""){
                error_message += "Blog's Summary must be provided"
            }
            toaster_error(error_message);
            return false;
        }

        if(image_files.length > 0){
            image_file = image_files[0].type;
            if((image_file != "image/jpg") && (image_file != "image/jpeg") && (image_file != "image/png")){
                toaster_error("Wrong Image Filetype");
                return false;
            }
        }
        
        url = API_URL+"blogs/"+data_id;
    }

    edited = tinymce.activeEditor.getContent();
    encoded = html_encode(edited);
    var fd = new FormData(document.querySelector(".blog_form"));
    fd.set('body', encoded);
    toaster_success("Blog Uploading...");
    $.ajax({
        type: "POST",
        url: url,
        data: fd,
        dataType: "json",
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "Authorization": "Bearer "+localStorage.getItem('token'),
            "Accept": "application/json"
        },
        success: function(response){
            if(response.status == "success"){
                toaster_success(response.message);
                if(data_id == ""){
                    window.location= ADMIN_URL+"blogs"
                } else {
                    window.location = ADMIN_URL+"blogs/"+response.data.slug
                }
            } else {
                toaster_error(response.message);
            }
        },
        error: function(response){
            message = JSON.parse(response.responseText);
            toaster_error(message.message);
            console.log(message);
        }
    })
});

var del_blog = document.querySelector("#delete_blog");
if(del_blog){
    del_blog.onclick = function(e){
        var blog_id = e.target.dataset['id'];
    
        $.ajax({
            type: "DELETE",
            url: API_URL+"blogs/"+blog_id,
            dataType: "json",
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Content-Type": "application/json",
                "Acceppt": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    toaster_success(response.message);
    
                    window.location = ADMIN_URL+"blogs";
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                message = JSON.parse(response.responseText);
                toaster_error(message.message);
                console.log(message);
            }
        })
    }
}

$("form.service_form").submit(function(e){
    e.preventDefault();

    var title = $("input#service_title").val();
    var summary = $("textarea#service_summary").val();
    var content = $("textarea#service_content").val();
    var solution = $("textarea#service_solution").val();
    var image_files = $("#image_upload")[0].files;
    var data_id = e.target.dataset['id'];

    if((title == "") || (summary == "") || (content == "") || (solution == "")){
        error_message = "";
        if(title == ""){
            error_message += "Service must be stated";
        }
        if(summary == ""){
            error_message += "Service Summary must be provided";
        }
        if(content == ""){
            error_message += "Service Content must be provided";
        }
        if(solution == ""){
            error_message += "Service Solution must be provided";
        }
        return false;
    }

    if(image_files.length > 0){
        image_file = image_files[0].type;
        if((image_file != "image/jpg") && (image_file != "image/jpeg") && (image_file != "image/png")){
            toaster_error("Wrong Image Filetype");
            return false;
        }
    }
    
    if(data_id == ""){
        var url = API_URL+"services";
    } else {
        var url = API_URL+"services/"+data_id;
    }

    var fd = new FormData(document.querySelector(".service_form"));
    toaster_success("Service Uploading...");
    $.ajax({
        type: "POST",
        url: url,
        data: fd,
        dataType: "json",
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "Authorization": "Bearer "+localStorage.getItem('token'),
            "Accept": "application/json"
        },
        success: function(response){
            if(response.status == "success"){
                toaster_success(response.message);
                if(data_id == ""){
                    window.location= ADMIN_URL+"services"
                } else {
                    window.location = ADMIN_URL+"services/"+response.data.slug
                }
            } else {
                toaster_error(response.message);
            }
        },
        error: function(response){
            message = JSON.parse(response.responseText);
            toaster_error(message.message);
            console.log(message);
        }
    })
});

var del_service = document.querySelector("#delete_service");
if(del_service){
    del_service.onclick = function(e){
        var service_id = e.target.dataset['id'];

        $.ajax({
            type: "DELETE",
            url: API_URL+"blogs/"+service_id,
            dataType: "json",
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Content-Type": "application/json",
                "Acceppt": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    toaster_success(response.message);
    
                    window.location = ADMIN_URL+"services";
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                message = JSON.parse(response.responseText);
                toaster_error(message.message);
                console.log(message);
            }
        })
    }
}

var testimonial_forms = document.querySelectorAll(".testimonial_form");
for(let i=0; i<testimonial_forms.length; i++){
    var testimonial_form = testimonial_forms[i];

    testimonial_form.onsubmit = function(e){
        e.preventDefault();

        var name = $("input#testimonial_name").val();
        var position =$("input#testimonial_position").val();
        var testimonial = $("textarea#testimonial").val();

        if((name == "") || (position == "") || (testimonial == "")){
            var error_message = "";
            if(name == ""){
                error_message += "Name must be provided! ";
            }
            if(position == ""){
                error_message += "Position must be provided! ";
            }
            if(testimonial == ""){
                error_message += "Testimonial must be provided"
            }

            toaster_error(error_message);
            return false;
        }

        var data_id = e.target.dataset['id'];
        if(data_id == ""){
            var url = API_URL+"testimonials"
        } else {
            var url = API_URL+"testimonials/"+data_id;
        }

        toaster_success("Uploading Testimonial...");

        var fd = new FormData(e.target);

        $.ajax({
            type: "POST",
            url: url,
            data: fd,
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Accept": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    window.location = BASE_URL+"dashboard";
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                message = JSON.parse(response.responseText);
                toaster_error(message.message);
                console.log(message);
            }
        });
    }
}

var testimonial_del_buttons = document.querySelectorAll(".delete_testimonial");
for(let i=0; i<testimonial_del_buttons.length; i++){
    del_button = testimonial_del_buttons[i];

    del_button.onclick = function(e){
        var test_id = e.target.dataset['id'];

        $.ajax({
            type: "DELETE",
            url: API_URL+"testimonials/"+test_id,
            dataType: "json",
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Content-Type": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    toaster_success("Deleting Testimonial...");

                    function redirect(){
                        window.location = BASE_URL+"dashboard";
                    }

                    setTimeout(redirect(), 2500);
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                console.log(response.responseText);
                message = JSON.parse(response.responseText);
                toaster_error(message.message);
            }
        })
    }
}

$("form.work_form").submit(function(e){
    e.preventDefault();

    var title = $("input#work_title").val();
    var summary = $("textarea#work_summary").val();
    var problem = $("textarea#work_problem").val();
    var solution = $("textarea#work_solution").val();
    var conclusion = $("textarea#work_conclusion").val();
    var url = $("input#work_url").val();
    var tags = $("textarea#work_tags").val();
    var data_id = e.target.dataset['id'];

    if((title == "") || (summary == "") || (problem == "") || (solution == "") || (conclusion == "") || (url == "") || (tags == "")){
        var error_message = "";
        if(title == ""){
            error_meaage += "Project Title must be provided! ";
        }
        if(summary == ""){
            error_message += "Project Summary must be provided! ";
        }
        if(problem == ""){
            error_message += "Problem must be stated! ";
        }
        if(solution == ""){
            error_message += "Solution must be stated! ";
        }
        if(conclusion == ""){
            error_message += "Conclusion must be provided! ";
        }
        if(url == ""){
            error_message += "Project's URL must be provided! ";
        }
        if(tags == ""){
            error_message += "Project Tags must be provided! ";
        }
        toaster_error(error_message);
        return false;
    }

    if(data_id == ""){
        var image_files = $('#image_upload')[0].files;
        if(image_files.length < 1){
            toaster_error("Project Photo must be uploaded!");
            return false;
        } else {
            var image_file = image_files[0].type;
            if((image_file != "image/jpg") && (image_file != "image/jpeg") && (image_file != "image/png")){
                toaster_error("Wrong Image Filetype");
                return false;
            }
        }

        url = API_URL+"works";
        method = "POST";
    } else {
        url = API_URL+"works/"+data_id;
        method = "PUT";
    }

    var fd = new FormData(document.querySelector(".work_form"));
    toaster_success("Uploading Project...")
    $.ajax({
        type: method,
        url: url,
        data: fd,
        dataType: "json",
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "Authorization": "Bearer "+localStorage.getItem('token'),
            "Accept": "application/json"
        },
        success: function(response){
            toaster_success(response.message);
            if(data_id == ""){
                window.location= ADMIN_URL+"projects"
            } else {
                window.location = ADMIN_URL+"projects/"+response.data.slug;
            }
        },
        error: function(response){
            message = JSON.parse(response.responseText);
            toaster_error(message.message);
            console.log(message);
        }
    })
});

var del_work = document.querySelector("#delete_work");
if(del_work){
    del_work.onclick = function(e){
        var work_id = e.target.dataset['id'];

        $.ajax({
            type: "DELETE",
            url: API_URL+"works/"+work_id,
            dataType: "json",
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Content-Type": "application/json",
                "Acceppt": "application/json"
            },
            success: function(response){
                if(response.status == "success"){
                    toaster_success(response.message);
    
                    window.location = ADMIN_URL+"projects";
                } else {
                    toaster_error(response.message);
                }
            },
            error: function(response){
                message = JSON.parse(response.responseText);
                toaster_error(message.message);
                console.log(message);
            }
        })
    }
}

var image_forms = document.querySelectorAll(".work_image_form");
for(let i=0; i<image_forms.length; i++){
    var image_form = image_forms[i];

    image_form.onsubmit = function(e){
        e.preventDefault();

        var work_id = $("input#work_id").val();
        var data_id = e.target.dataset['id'];

       

        if(data_id == ""){
            var url = API_URL+"works/images";
        } else {
            var url = API_URL+"works/images/"+data_id;
        }

        toaster_success("Uploading Image...")
        var fd = new FormData(e.target);
        $.ajax({
            type: "POST",
            url: url,
            data: fd,
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Accept": "application/json"
            },
            success: function(response){
                toaster_success("Upload successful");
                window.location = ADMIN_URL+"projects/"+response.data.slug;
            },
            error: function(response){
                var message = JSON.parse(response.responseText);
                toaster_error(message.message);
                console.log(message);
            }
        })
    }
}

var image_del_buttons = document.querySelectorAll(".delete_workImage");
for(let i=0; i<image_del_buttons.length; i++){
    del_button = image_del_buttons[i];

    del_button.onclick = function(e){
        var image_id = e.target.dataset['id'];

        $.ajax({
            type: "DELETE",
            url: API_URL+"works/images/"+image_id,
            dataType: "json",
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token'),
                "Content-Type": "application/json"
            },
            success: function(response){
                toaster_success("Deleting Image...");
                function redirect(){
                    window.location = ADMIN_URL+"projects/"+response.data.slug;
                }

                setTimeout(redirect(), 2500);
            },
            error: function(response){
                var message = JSON.parse(response.responseText);
                console.log(message.message);
                toaster_error(message);
            }
        })
    }
}

function toaster_error(error_message){
    toastr.error(error_message, "Error", {
        positionClass: "toast-top-right",
        timeOut: 500000000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
}

function toaster_success(success_message){
    toastr.success(success_message, "Success", {
        timeOut: 500000000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
}

$('textarea.wysiwyg_editor').tinymce({
    height: 500,
    menubar: false,
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
      'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | bold italic backcolor | ' +
      'alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | removeformat | help'
});