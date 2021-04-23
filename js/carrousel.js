(function(){
    let bout1 = document.getElementById("un")
    let bout2 = document.getElementById("deux")
    let bout3 = document.getElementById("trois")
    let carrousel = document.querySelector(".carrousel")
    /*bouton 1 */
    bout1.addEventListener('mousedown', function(){
        carrousel.style.transform = "translateX(0)";
    })
    /*bouton 2*/
    bout2.addEventListener('mousedown', function(){
        carrousel.style.transform = "translateX(-100vw)";
    })
    /*bouton 3*/
    bout3.addEventListener('mousedown', function(){
        carrousel.style.transform = "translateX(-200vw)";
    })
}())