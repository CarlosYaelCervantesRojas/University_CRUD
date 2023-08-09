let boton = document.getElementById('activo');
let valor = document.getElementById('editar');

boton.addEventListener('click', (e)=>{
    e.preventDefault();
    boton.classList.toggle('bg-green-400');
    boton.classList.toggle('bg-red-600');
    boton.classList.toggle('justify-end');
    if (valor.value == 1) {
        valor.value = 0;
        // console.log(valor.value);
    }
    if (valor.value == 0 && boton.classList.contains('bg-green-400')) {
        valor.value = 1;
        // console.log(valor.value);
    }
});