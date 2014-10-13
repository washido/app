var User = {

    id     : '',
    movies : []

};

var FacebookImport = {

    getMovies : function(url){
        url = url || '/me/video.watches';
        $('body').addClass('has-loader');

        FB.api(url, function(response) {
            var data       = response.data;
            var dataLenght = response.data.length;
            
            for(i = 0; i < dataLenght; i++){
                if (data[i].data.movie) {
                    User.movies.push(data[i].data.movie);
                }
            }

            if(dataLenght == 25){
                FacebookImport.getMovies(response.paging.next);
            }else{
                FacebookImport.saveMovies();
            }

        });

    },

    saveMovies : function(){
        $.ajax({
            url: 'app/import',
            type: 'POST',
            data: { movies : User.movies, userID : User.id },
            success : function(data){
                User.movies = [];
                console.log(data);
            }
        })
        .always(function(){
            $('body').removeClass('has-loader');
        })
        .done(function() {
            alert('Dados importados com sucesso');
        })
        .fail(function() {
            alert('Erro ao importar dados');
        })
    },
};