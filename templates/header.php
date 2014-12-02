<div id="facebook-wrapper">
    <fb:login-button class="btn-face" scope="user_actions.videos,user_actions.books,user_actions.music,user_friends,user_likes" onlogin="checkLoginState();"></fb:login-button>
</div>


<!-- opcoes usuário logado  -->
<div class="pure-g-r">
	<div class="pure-u-1 pure-u-lg-11-24 user-wrap">
	    <div class="user-img-wrap">
	        <img  id="imgUsuario" width="35px" src="https://graph.facebook.com/guilherme.longaraydefraga/picture">
	    </div>
	    <div class="pure-u-1-3" id="nome-usuario"></div>
	    
	    <div class="user-opcoes-wrap pure-u-11-24">
            <a href="/me/movies">Videos</a> | 
            <a href="/me/musics">Músicas</a> | 
            <a href="/me/books">Livros</a>  
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#" id="logout">Sair</a>
        </div>
	</div>
</div>
