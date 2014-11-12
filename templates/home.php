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
        <?php 
            /* <div class="recomendacao-wrap"> 
            <div id="btn-fechar">X</div>
            <h1 class="recomendacao-title align-left">Você pode gostar de ...</h1>
                
                <!-- 1 recomendacao -->
                <div class="recomendacao align-center">
                    <h2 class="recomendacao-filme-titulo align-left">O Rei Leão<span class="recomendacao-filme-ano">1994</span></h2>
                    <div class="align-left recomendacao-filme-conteudo">
                        <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/v/t1.0-1/c0.37.320.320/p320x320/430641_10150560165422462_999155316_n.jpg?oh=c2f1e0e114f334a5b9b1d17c7a391af2&oe=54E61C61&__gda__=1423822729_2bb1edd80d1afc62e2647c823bf306a4" class="recomendacao-filme-img">
                        <div class="recomendacao-filme-content">
                            <p class="filme-descricao">Tricked into thinking that he caused the death of his own father, a young lion cub flees and abandons his destiny as the future king.</p>

                            <a class="blueButton" href="#"><span class="blueButtonText">Compartilhar escolha</span></a>
                        </div>

                    </div>
                </div>

                <!-- 2 recomendacao -->
                <div class="recomendacao align-center">
                    <h2 class="recomendacao-filme-titulo align-left">O Rei Leão<span class="recomendacao-filme-ano">1994</span></h2>
                    <div class="align-left recomendacao-filme-conteudo">
                        <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/v/t1.0-1/c0.37.320.320/p320x320/430641_10150560165422462_999155316_n.jpg?oh=c2f1e0e114f334a5b9b1d17c7a391af2&oe=54E61C61&__gda__=1423822729_2bb1edd80d1afc62e2647c823bf306a4" class="recomendacao-filme-img">
                        <div class="recomendacao-filme-content">
                            <p class="filme-descricao">Tricked into thinking that he caused the death of his own father, a young lion cub flees and abandons his destiny as the future king.</p>

                            <a class="blueButton" href="#"><span class="blueButtonText">Compartilhar escolha</span></a>
                        </div>

                    </div>
                </div>

                <!-- 3 recomendacao -->
                <div class="recomendacao align-center">
                    <h2 class="recomendacao-filme-titulo align-left">O Rei Leão<span class="recomendacao-filme-ano">1994</span></h2>
                    <div class="align-left recomendacao-filme-conteudo">
                        <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/v/t1.0-1/c0.37.320.320/p320x320/430641_10150560165422462_999155316_n.jpg?oh=c2f1e0e114f334a5b9b1d17c7a391af2&oe=54E61C61&__gda__=1423822729_2bb1edd80d1afc62e2647c823bf306a4" class="recomendacao-filme-img">
                        <div class="recomendacao-filme-content">
                            <p class="filme-descricao">Tricked into thinking that he caused the death of his own father, a young lion cub flees and abandons his destiny as the future king.</p>

                            <a class="blueButton" href="#"><span class="blueButtonText">Compartilhar escolha</span></a>
                        </div>

                    </div>
                </div>         
        </div> */
        ?>
        <div id="wrapper" class="wrapper">

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
        <script type="text/javascript" src="assets/js/FacebookImport.js"></script>
        <script type="text/javascript" src="assets/js/home.js"></script>
    </body>
</html>
