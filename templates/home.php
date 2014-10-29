<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>What Should I Do?</title>
        
        <link rel="stylesheet" href="assets/css/pure-min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="">
        
        <div class="importing-layer">
            <p>
                Importando dados
                <br><br>
                <i class="fa fa-3x fa-spin fa-spinner"></i>
            </p>
        </div>


        <div class="result-wrap">
            <div class="result">
                <h2>Você pode gostar de:</h2>
                <ul class="result-items">
                     
                </ul>
            </div>
        </div>

        <fb:login-button scope="user_actions.videos,user_actions.books,user_actions.music,user_friends" onlogin="checkLoginState();"></fb:login-button>

        <div class="content">
            <h1 class="title">What Should I<br /><span class="do_color">Do ?</span></h1>
            <br />
            <br />
            <br />
            <div class="pure-g-r">
                <div class="pure-u-1-6">
                    <a href="javascript:void(0)" data-item="musics" class="btn_music btn"><i class="fa fa-music fa-5x fa-border"></i></a>
                </div>
                
                <div class="pure-u-1-6">
                    <div class="film-center">
                        <a href="javascript:void(0)" data-item="movies" class="btn_film btn"><i class="fa fa-film fa-5x fa-border"></i></a>
                    </div>
                </div>
                
                <div class="pure-u-1-6">
                    <a href="javascript:void(0)" data-item="books" class="btn_book btn"><i class="fa fa-book fa-5x fa-border"></i></a>
                </div>
            </div>
            <br />
            <br />
            &nbsp;
        </div>

        <div id="footer" class="footer">
            <div class="footer-data">
                <div class="footer-itens pure-u-4-6"><a href="sobre">Sobre</a></div>  
                <div class="footer-itens pure-u-4-6"><a href="quem-somos">Quem Somos</a></div>
                <div class="footer-itens pure-u-4-6"><a href="contato">Contato</a></div>
                <div class="footer-itens img pure-u-4-6">
                    <i class="fa fa-facebook-square fa-2x"></i>
                    <i class="fa fa-twitter-square fa-2x"></i>
                    <i class="fa fa-github-square fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Le Javascripts -->
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/FacebookImport.js"></script>
        <script type="text/javascript" src="assets/js/home.js"></script>
    </body>
</html>