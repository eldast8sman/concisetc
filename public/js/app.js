var BASE_URL = "http://127.0.0.1:8000/";
var API_URL = BASE_URL + "api/";

if($("button#load_blogs")){
    var page = 2;

    $("button#load_blogs").click(function(){
        $(".error_msg").remove();
        $.ajax({
            type: "GET",
            url: API_URL+"blogs",
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