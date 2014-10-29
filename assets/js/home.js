$(function(){
    $(document).on('mouseleave', '.btn', function() {
        $('.do_color').text("Do ?");
        $('.do_color').css("color", "#0E0E0E");
    });
    
    $(document).on('mouseover', '.btn_film', function() {
        $('.do_color').text("WATCH ?");
        $('.do_color').css("color", "#FF5B5B");
    });
    $(document).on('mouseover', '.btn_book', function() {
        $('.do_color').text("READ ?");
        $('.do_color').css("color", "#1BCD35");
    });
    $(document).on('mouseover', '.btn_music', function() {
        $('.do_color').text("LISTEN ?");
        $('.do_color').css("color", "#53A9FF");
    });

    $(document).on('click', '.btn_film', function(){
        var self = this;
        $.ajax({
            url: 'app/recommend',
            type: 'POST',
            dataType : 'JSON',
            data: {userID: User.id, 'type' : 'movie'},
            beforeSend : function(){
                $(self).addClass('fa-spin');
            },
            success : function(data){
                var lis = '';
                $.each(data.items, function(i, val){
                    lis += '<li>' + val + '</li>'
                });

                $('.result .result-items').html(lis);
                $('.result').addClass('visible');
            }
        })
        .fail(function() {
            alert('Desculpe, houve algum erro :/');
        })
        .always(function(){
            $(self).removeClass('fa-spin');
        });

    });

});


    // This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    if (response.status === 'connected') {
        User.id = response.authResponse.userID;
        FacebookImport.getItems();
    }
    else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      console.log('Please log into this app.');
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      console.log('Please log into Facebook.');
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
}

window.fbAsyncInit = function() {
    FB.init({
        appId      : '323337237844822',
        cookie     : true,  // enable cookies to allow the server to access 
                            // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.1' // use version 2.1
    });

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });

};


(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));