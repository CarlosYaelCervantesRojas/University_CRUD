let menu = document.getElementById('menu');
let navBar = document.getElementById('nav');
let close = document.getElementById('close');

menu.addEventListener('click',()=>{
    navBar.classList.toggle('hidden');
});

close.addEventListener('click', ()=>{
    navBar.classList.add('hidden');
});