<html>
 <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>What Should I Do?</title>
      
      <link rel="stylesheet" href="assets/css/pure-min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
      <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
 </head>
 <body>
    <div id="wrapper">
            <!-- header -->
            <div id="header">
                <?php include "header.php"; ?>
            </div>

            <!-- fim do header -->

            <div id="content" class="content">
              <h1 class="title-sobre"><a href="index.php">What Should I Do?</a></h1> 
              <br />
              <div class="pure-g-r">
               <div class="pure-u-1 pure-u-sm-3-4 contato">
                <h2 class="h2-sobre">Contato</h2>
                 <div id="contact">         
                    <form action="" method="post" class="row pure">
                      <fieldset>
                          <div class="field contact-name">
                            <label for="field-name">Nome</label>
                            <input type="text" name="name" id="field-name" />
                         </div>
                          <div class="field contact-sexo">
                            <label for="field-email">E-mail</label>
                            <input type="text" name="email" id="field-email" />
                          </div>
                        
                          <div class="field contact-subject">
                            <label for="field-subject">Assunto</label>
                            <input type="text" name="subject" id="field-subject" placeholder="" />
                          </div>
                        
                          <div class="field contact-message">
                            <label for="field-message">Mensagem</label>
                            <textarea name="message" id="field-message" placeholder=""></textarea>
                          </div>
                          
                      </fieldset>
                    </form>
                    <center><button><i class="fa fa-paper-plane fa-5x"></i></button></center>
                    </div>
                  </div>
                </div>
              </div>
          <div id="footer">
              <?php include "footer.html"; ?>
          </div>
        </div>
 </body>
</html>
