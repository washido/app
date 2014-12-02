$(function(){


    $(document).on('click', '#logout', function(){
        FB.logout(function(response) {
            console.log(response);
        });

        localStorage.removeItem('nome');
        localStorage.removeItem('imagem');
        localStorage.removeItem('logado');
        $('#facebook-wrapper').css('display', "block");
        $('.user-wrap').hide();

    });

    if( localStorage.getItem('logado') ){
        var nome = localStorage.getItem('nome');
        var imagem = localStorage.getItem('imagem');

        $('#nome-usuario').html(nome);
        $('#imgUsuario').attr('src', imagem);
        $('#facebook-wrapper').css('display', "none");
    }else{
        $('.user-wrap').hide();
    }

    $(document).on('click', '#btn-fechar', function(){
        $('body').removeClass("recomendacao-visible");
    });
    
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

    $(document).on('click', '.btn_film, .btn_book, .btn_music', function(){
        var self = this;
        
        $.ajax({
            url: 'app/recommend',
            type: 'POST',
            dataType : 'JSON',
            data: {userID: User.id, 'type' : $(self).data('item') },
            beforeSend : function(){
                $(self).addClass('fa-spin');
            },
            success : function(data){
                if (data.success === true) {
                    var template = [];
                    // console.log(data);
                    
                    $.each(data.items, function(index, el){
                        var title  = el.title;
                        var imagem = el.img;
                        var link   = el.url;

                        template.push('<div class="recomendacao align-center"> <h2 class="recomendacao-filme-titulo align-left"> <div class="titulo">'+title+'</div> <span class="recomendacao-filme-ano"> </span> </h2> <div class="align-left recomendacao-filme-conteudo"><a href="'+link+'" target="_blank"><img src="'+imagem+'" class="recomendacao-filme-img"></a> <div class="recomendacao-filme-content"> <p class="filme-descricao" style="display:none;">Descricão</p> <a class="blueButton" href="https://www.facebook.com/sharer/sharer.php?u='+link+'" target="_blank"> <span class="blueButtonText">Compartilhar escolha</span> </a> </div> </div> </div>');
                    });

                    template = template.join('');
                    $('#items-area').html(template);
                    $('body').addClass('recomendacao-visible');
                }else{
                    alert('Desculpe, não houve nenhuma recomendação');
                }
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
        
        if( !localStorage.getItem('logado') ){
            FacebookImport.getItems();
            FB.api('/me?fields=picture,name', function(res){
                localStorage.setItem('nome',res.name);
                localStorage.setItem('imagem', res.picture.data.url);
                localStorage.setItem('logado', true);
                $('.user-wrap').show();
                $('#facebook-wrapper').css('display', "none");

                $('#nome-usuario').html(res.name);
                $('#imgUsuario').attr('src', res.picture.data.url);
            });
        }
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
