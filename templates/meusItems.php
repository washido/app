<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>What Should I Do? | Meus Items</title>
        
        <link rel="stylesheet" href="/assets/css/pure-min.css">
        <link rel="stylesheet" href="/assets/css/grids-responsive-min.css"> 
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <style>.active{ text-decoration: underline; }</style>
    </head>
    <body>
         <div id="wrapper" class="wrapper">
            <!-- header -->
                <div id="header">
                    <?php include "header.php"; ?>
                </div>
            <!-- fim do header -->     
       
            <div class="content">
                <!-- <h1 class="title-sobre"><a href="index.php">Meus items</a></h1> -->
                <h2>
                        <a class="<?php echo $type=="musics" ? 'active' : '' ?>" href="../me/musics">Músicas</a> -
                        <a class="<?php echo $type=="books" ? 'active' : '' ?>" href="../me/books">Livros</a> -
                        <a class="<?php echo $type=="movies" ? 'active' : '' ?>" href="../me/movies">Filmes</a>
                </h2>
                <br>
                <div class="pure-g-r">
                    <div class="pure-u-1-24 pure-u-sm-3-4 quem-somos">

                        <?php foreach ($i as $value): ?>
                        <a href="<?php echo $value['url'] ?>" target="_blank">
                            <img
                                title="<?php echo $value['title']; ?>" 
                                src="https://graph.facebook.com/<?php echo $value['_id'] ?>/picture?height=100&width=100" 
                                style="width:100px; height: 100px;" 
                            />
                        </a>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div id="footer" class="footer pure-g">
                <?php include "footer.html"; ?>
            </div>
        </div>  
    </body>
</html>
