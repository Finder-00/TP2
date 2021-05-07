    (function(){
    let bouton = document.getElementById('bout_nouvelles');
    let nouvelles = document.querySelector('.contenuNouvelles');
    bouton.addEventListener('mousedown', monAjax);

    // Ajax = Asynchronous JavaScript + XML
function monAjax(){
    let maRequete = new XMLHttpRequest();
    maRequete.open('GET', monObjJS.siteURL + '/wp-json/wp/v2/posts?categories=3&per_page=3');
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


/*------------------------------------
 * Controle du formulaire qui ajoute une nouvelle a partir du site pour l'admin
-------------------------------------*/

let bout_ajout = document.getElementById('bout-rapide')
bout_ajout.addEventListener('mousedown', function(){
    let monArticle = {
        "title" : document.querySelector('.admin-rapide [name="title"]').value,
        "content" : document.querySelector('.admin-rapide [name="content"]').value,
        "status" : "publish",
        "categories" : [3] // pour moi no3 dans phpMyAdmin
    }
    // on soummet les valeur de l'article par requette XML
    let creeArticle = new XMLHttpRequest();
    creeArticle.open("POST", monObjJS.siteURL +  '/wp-json/wp/v2/posts')
    creeArticle.setRequestHeader('X-WP-Nonce', monObjJS.nonce)
    creeArticle.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    creeArticle.send(JSON.stringify(monArticle))
    creeArticle.onreadystatechange = function(){
        console.log(monArticle);
        if(creeArticle.readyState == 4){
            if(creeArticle.status == 201){
                document.querySelector('.admin-rapide [name="title"]').value = ''
                document.querySelector('.admin-rapide [name="content"]').value = '';
            }
            else{
                alert('erreur ' + creeArticle.status);
            }
        }
    }
})


}())