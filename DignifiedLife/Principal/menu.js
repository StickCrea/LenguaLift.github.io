const nav = document.querySelector('.nav');
const menu_btn = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu');

    window.addEventListener('scroll', function(){
        nav.classList.toggle('active', window.scrollY >0);

    })

    menu_btn.addEventListener('click', () => {
        menu.classList.toggle('active')
})

let caja=document.getElementById("subir__arriba");
caja.addEventListener("click",function(){
    document.documentElement.scrollTop=0;

})

window.addEventListener('scroll', function(){
    if(document.documentElement.scrollTop > 0) {
         caja.style.display="flex";
    } else {
        caja.style.display="none";

    }

})