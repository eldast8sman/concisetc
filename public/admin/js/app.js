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

        if((name == "") || (position == "")){
            var error_message = "";
            if(name == ""){
                error_message += "Name must be provided! ";
            }
            if(position == ""){
                error_message += "Position must be provided! ";
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
                console.log(response.responseText);
                toaster_error(response.responseText);
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