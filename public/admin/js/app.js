// var BASE_URL = "https://www.cfcing.org/";
var BASE_URL = "http://127.0.0.1:8000/";
var ADMIN_URL = BASE_URL + "dashboard/";
var API_URL = BASE_URL + "api/";

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

            window.location = ADMIN_URL;
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
                    window.location = ADMIN_URL;
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
                        window.location = ADMIN_URL;
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