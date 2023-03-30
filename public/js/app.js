var BASE_URL = "http://127.0.0.1:8000/";
var API_URL = BASE_URL + "api/";

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