let menu = document.getElementById('menu');
let navBar = document.getElementById('nav');
let close = document.getElementById('close');
let logout = document.getElementById('logout');
let out = document.getElementById('out');
let arrow = document.getElementById('arrow');

menu.addEventListener('click',()=>{
    navBar.classList.toggle('hidden');
});

close.addEventListener('click', ()=>{
    navBar.classList.add('hidden');
});

out.addEventListener('click', ()=>{
    logout.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
});