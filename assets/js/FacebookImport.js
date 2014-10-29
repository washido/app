var User = {
    /**
     * ID do usuário recebido pelo facebook
     * @type {String}
     */
    id     : '',

    /**
     * Lista de filmes do usuário logado
     * @type Array de objetos
     * {
     *   id : 0283901,
     *   title : "titanic"
     * }
     */
    movies : [],
    
    /**
     * Lista de musicas do usuário logado
     * @type Array de objetos
     * {
     *   id : 190288,
     *   title : "Pentada violenta"
     * }
     */
    musics : [],

    /**
     * Lista de livros do usuário logado
     * @type Array de objetos
     * {
     *   id : 1829798,
     *   title : "50 tons de Cinza"
     * }
     */
    books  : [],

};

var FacebookImport = {
    imported : 0,

    /**
     * Manda buscar todos os dados, 
     * Seta como 0 os dados importados,
     * Exibe a layer de importação
     */
    getItems : function(){
        $(".importing-layer").show();
        FacebookImport.imported = 0;
        FacebookImport.getMusics();
        FacebookImport.getMovies();
        FacebookImport.getBooks();
    },


    /**
     * Pega todas as músicas do usuário, busca no facebook e se houver paginação
     * faz novamente, até terminar
     * @param  {[type]} url Se houver uma url setada, usa ela, senão usa a default
     * @return {[type]}     Sem retorno
     */
    getMusics : function(url){
        var url = url || '/me/music.listens?fields=data';
        
        FB.api(url, function(response) {
            var data       = response.data;
            var dataLenght = response.data.length;
            
            if (dataLenght > 0) {
                /**
                 * Percorre todo retorno do facebook
                 */
                for(i = 0; i < dataLenght; i++) {
                    /**
                     * Se for uma música, adiciona ao array de musicas do usuário
                     */
                    if (data[i].data.song) {
                        User.musics.push({
                            "_id"    : data[i].data.song.id,
                            "title" : data[i].data.song.title,
                            "url"   : data[i].data.song.url,
                            "img"   : "https://graph.facebook.com/" + data[i].data.song.id + "/picture?height=200&width=200"
                        });
                    }
                }
                FacebookImport.saveItems('musics', User.musics);
                User.musics = [];
                
                /**
                 * Se o tamanho for 25, pega a paginação e refaz a chamada
                 */
                if(dataLenght == 25)
                    FacebookImport.getMusics(response.paging.next);
                else
                    FacebookImport.imported++;
            }else{
                FacebookImport.imported++;
            }
        });
    },

    getMovies : function(url){
        var url = url || '/me/video.watches?fields=data';
        FB.api(url, function(response) {
            var data       = response.data;
            var dataLenght = response.data.length;
            
            if (dataLenght > 0 ) {
                for(i = 0; i < dataLenght; i++){
                    if (data[i].data.movie) {
                        User.movies.push({
                            "_id"    : data[i].data.movie.id,
                            "title" : data[i].data.movie.title,
                            "url" : data[i].data.movie.url,
                            "img"   : "https://graph.facebook.com/" + data[i].data.movie.id + "/picture?height=200&width=200"
                        });
                    }
                }
                FacebookImport.saveItems('movies', User.movies);
                User.movies = [];

                if(dataLenght == 25)
                    FacebookImport.getMovies(response.paging.next);
                else
                    FacebookImport.imported++;
            }
            else
                FacebookImport.imported++;
        });

    },

    getBooks : function(url){
        var url = url || '/me/book.reads?fields=data';
        FB.api(url, function(response) {
            var data       = response.data;
            var dataLenght = response.data.length;
            
            if (dataLenght > 0) {
                for(i = 0; i < dataLenght; i++){
                    if (data[i].data.book) {
                        User.books.push({
                            "_id"    : data[i].data.book.id,
                            "title" : data[i].data.book.title,
                            "url" : data[i].data.book.url,
                            "img"   : "https://graph.facebook.com/" + data[i].data.book.id + "/picture?height=200&width=200"
                        });
                    }
                }

                FacebookImport.saveItems('books', User.books);
                User.books = [];

                if(dataLenght == 25)
                    FacebookImport.getMovies(response.paging.next);
                else
                    FacebookImport.imported++;
            }else{
                FacebookImport.imported++;
            }
        });

    },

    saveItems : function(type, items){
        $.ajax({
            url: 'app/import',
            type: 'POST',
            data: { 
                "items"  : items, 
                "type"   : type,
                "userID" : User.id 
            }
        })
        .always(function(){
            console.log('Importados : %d, tipo: %s', FacebookImport.imported, type);
            if(FacebookImport.imported === 3)
                $(".importing-layer").hide();
        })
        .done(function() {
            console.log("Dados importados com sucesso { " + type + " }");
        })
        .fail(function() {
            console.log('Erro ao importar: ' + type);
        })
    },
};