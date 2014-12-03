<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta charset="utf-8">
  <title>Importação Manual Facebook - Washido</title>
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="col-xs-5">
        <h2>Configurações</h2>
        <div class="well">
          <form>
            <div class="form-group">
              <label>App ID</label>
              <input type="text" id="appId" class="form-control"/>
            </div>
            
            <div class="form-group">
              <button class="btn btn-primary">
                Enviar
              </button>
            </div>

            <div class="form-group" id="fblogin"></div>
          </form>
        </div>
      </div>
      <div class="col-xs-7">
        <h2>LOG</h2>
        <div class="well" id="log">

        </div>
      </div>
    </div>
  </div>
  

  <script type="text/javascript" src="/assets/js/FacebookImport.js"></script>
  <script>

    function log(obj){
      $('#log').prepend('<pre>' + JSON.stringify(obj) + '</pre>');
    }

    $(function(){
      $(document).on('submit', 'form', function(e){
        e.preventDefault();
        
        localStorage.removeItem('nome');
        localStorage.removeItem('imagem');
        localStorage.removeItem('logado');

        var appId = $('#appId').val();
        iniciaFacebook(appId);
        $('#fblogin').append('<fb:login-button class="btn-face" scope="user_actions.videos,user_actions.books,user_actions.music,user_friends,user_likes" onlogin="checkLoginState();"></fb:login-button>');
        return;
      });
    });

    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        if (response.status === 'connected') {
            User.id = response.authResponse.userID;
            log(response);
            if( !localStorage.getItem('logado') ){
                FacebookImport.getItems();
                FB.api('/me?fields=picture,name', function(res){
                    log(res);
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

    function iniciaFacebook(appId){
      window.fbAsyncInit = function() {
        FB.init({
            appId      : appId,
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
    }

  </script>
  

</body>
</html>