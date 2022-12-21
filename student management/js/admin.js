let navbar  = document.querySelector('.menu');
let menu  = document.querySelector('#menu-btn');


menu.onclick = () =>{
    navbar.classList.toggle('active');
    menu.classList.toggle('fa-times');
}
window.scroll = () =>{
    navbar.classList.remove('active');
    menu.classList.remove('fa-times');
}