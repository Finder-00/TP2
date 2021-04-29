(function(){
    let bouton = document.getElementById('bout_nouvelles');
    let nouvelles = document.querySelector('.nouvelles section');
    bouton.addEventListener('mousedown', monAjax);

function monAjax(){
    let maRequete = new XMLHttpRequest();
    maRequete.open('GET', 'http://localhost:8888/4w4-tim/wp-json/wp/v2/posts?categories=3&per_page=3');
    maRequete.onload = function(){
        if(maRequete.status >= 200 && maRequete.status <= 400){
            let data = JSON.parse(maRequete.responseText);
            chaineResultat = ''
            for(const elm of data){
                chaineResultat += '<h2>' + elm.title.rendered + '</h2>';
                chaineResultat += elm.content.rendered;
            }
            nouvelles.innerHTML = chaineResultat;
        }
        else{
            console.log("la connexion est faites mais il y a une erreur")
        }
    }
    maRequete.onerror = function(){
        console.log('erreur de connexion')
    }
    maRequete.send();
}

}())