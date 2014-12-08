<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>What Should I Do?</title>
        
        <link rel="stylesheet" href="/assets/css/pure-min.css">
        <link rel="stylesheet" href="/assets/css/grids-responsive-min.css"> 
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <div class="recomendacao-wrap"> 
            <div id="btn-fechar">X</div>
            <h1 class="recomendacao-title align-left">Você pode gostar de ...</h1>
            <div id="items-area"></div>
        </div>
        <div id="wrapper" class="wrapper">

            <?php /*
            <div class="importing-layer">
                <p>
                    Importando dados
                    <br><br>
                    <i class="fa fa-3x fa-spin fa-spinner"></i>
                </p>
            </div>
            */ ?>

            <!-- header -->
            <div id="header">
                <?php include "header.php"; ?>
            </div>

            <!-- fim do header -->

            <div class="content">
                <h1 class="title">What Should I<br /><span class="do_color">Do ?</span></h1>
                <br />
                <br />
                <br />
                <div class="pure-u-1 pure-u-md-3-5" style="margin: 0 auto;" >
                    <div class="pure-g div-opcoes">

                        <div class="pure-u-md-1-3 div-opcao align-right">
                            <div class="div_espacamento"></div>
                            <a href="javascript:void(0)" data-item="musics" class="btn_music btn">
                                <div class="pure-u-1 pure-u-md-3-5 div-music">
                                    <i class="fa fa-music fa-5x"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="pure-u-md-1-3 div-opcao align-right">
                            <a href="javascript:void(0)" data-item="movies" class="btn_film btn">
                                <div class="pure-u-1 pure-u-md-3-5 div-film">
                                    <i class="fa fa-film fa-5x"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="pure-u-md-1-3 div-opcao align-right">
                            <a href="javascript:void(0)" data-item="books" class="btn_book btn">
                                <div class="pure-u-1 pure-u-md-3-5 div-book">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br />
                <br />
                &nbsp;
            </div>
            
            <div id="footer" class="footer pure-g">
                <?php include "footer.html"; ?>
            </div>
        </div>
        <!-- Le Javascripts -->
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/lodash.js" async></script>
        <script type="text/javascript" src="assets/js/FacebookImport.js"></script>
        <script type="text/javascript" src="assets/js/home.js"></script>
        
        <script type="text/template" id="recomendacao">

            <div class="recomendacao-wrap"> 
                <div id="btn-fechar">X</div>
                <h1 class="recomendacao-title align-left">Você pode gostar de ...</h1>

                <% _.forEach(items, function(item) { %>
                
                <div class="recomendacao align-center">
                    <h2 class="recomendacao-filme-titulo align-left">
                        <%- item.title %>
                        <span class="recomendacao-filme-ano">
                            
                        </span>
                    </h2>
                    <div class="align-left recomendacao-filme-conteudo">
                        <img src="<%= item.img %>" class="recomendacao-filme-img">
                        <div class="recomendacao-filme-content">
                            <p class="filme-descricao">
                                Descricão
                            </p>
                            <a class="blueButton" href="#">
                                <span class="blueButtonText">
                                    Compartilhar escolha
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <% } %>
            </div>
        </script>
        
        
    </body>
</html>
