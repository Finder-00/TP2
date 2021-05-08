(function(){
    let bar1 = document.querySelector('#burger div:nth-of-type(1)');
    let bar2 = document.querySelector('#burger div:nth-of-type(2)');
    let bar3 = document.querySelector('#burger div:nth-of-type(3)');
    let burger = document.getElementById('burger');
    let nav = document.querySelector('.main-navigation ul');

    burger.addEventListener('mousedown', function(){
        //console.log(burger.id);
        if(bar1.classList.contains('ouvrirX1') == false){
            bar1.classList.remove('fermerX1');
            bar1.classList.add('ouvrirX1');
            bar2.classList.remove('fermerX2');
            bar2.classList.add('ouvrirX2');
            bar3.classList.remove('fermerX3');
            bar3.classList.add('ouvrirX3');
            nav.classList.add('visible');
        }
        else{
            bar1.classList.remove('ouvrirX1');
            bar1.classList.add('fermerX1');
            bar2.classList.remove('ouvrirX2');
            bar2.classList.add('fermerX2');
            bar3.classList.remove('ouvrirX3');
            bar3.classList.add('fermerX3');
            nav.classList.remove('visible');
        }
    })
}());