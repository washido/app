<fb:login-button class="btn-face" scope="user_actions.videos,user_actions.books,user_actions.music,user_friends,user_likes" onlogin="checkLoginState();"></fb:login-button>

<!-- opcoes usuário logado  -->
<div class="pure-u-1 pure-u-md-5-12 user-wrap">
    
    <div class="user-img-wrap pure-u-md-1-12">
        <img width="35px" src="https://graph.facebook.com/guilherme.longaraydefraga/picture">
    </div>
    
    <div class="user-nome-wrap pure-u-md-1-2">
        {{ Nome }}    
    </div>
    
    <div class="user-opcoes-wrap pure-u-md-1-3">
        <a href="/me/movies">Videos</a> 
        | 
        <a href="/me/musics">Músicas</a> 
        | 
        <a href="/me/books">Livros</a>
    </div>
</div>