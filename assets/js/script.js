const bar = document.getElementById('bar');
const hamburger = document.getElementById('hamburger');
const close= document.getElementById('close');
const navbar = document.getElementById('navbar');

if(hamburger){
    hamburger.addEventListener('click', () => {
        bar.classList.toggle('active');
        close.classList.toggle('bx-x');
    });
}

const changeColor = () =>{
    if(window.scrollY >=100){
        navbar.classList.add('header-bg'); 
    }else{
        navbar.classList.remove('header-bg');
    }
};
window.addEventListener("scroll",changeColor);