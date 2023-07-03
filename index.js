//antes de la instalación 
let eventoIntalar;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    eventoIntalar = e;
});
//funcion disparada por el boton "instalar"
function instalarAplicacion() {
    eventoIntalar.prompt();
    console.log("instalando mis brownies");
}
//si la app se instala, guardo ese dato en el localstorage para eliminar el boton de instalación
window.addEventListener('appinstalled', () => {
    let botonInstalador = document.querySelector('.btn-install');
    botonInstalador.classList.add('ocultar');
    localStorage.setItem('instalado', true);
});

window.addEventListener('DOMContentLoaded', function() {

    //si la app está instalada, no va a aparecer un boton de instalación
    let instalado = localStorage.getItem('instalado');
    if (instalado) {
        let botonInstalador = document.querySelector('.btn-install');
        botonInstalador.classList.add('ocultar');
    }

    //menu responsive
    const menu = document.querySelector('.menu-icon')
    let nav = document.querySelector('.menu-container');
    //toggle para activar/desactivar los estilos del menu
    menu.addEventListener('click', () => {
        nav = document.querySelector('.menu-container');
        nav.classList.toggle('active');
    })



    //api externa para cargar socios aleatorios con fetch
    const DIV = document.querySelector('.container-socios');
    const BUTTON_FETCH = document.querySelector('#versocios');
    
    BUTTON_FETCH.addEventListener('click', function(){


        let socios = [];
        socios.push(JSON.parse(localStorage.getItem(`socio0`)));
        socios.push(JSON.parse(localStorage.getItem(`socio1`)));
        socios.push(JSON.parse(localStorage.getItem(`socio2`)));

            if (localStorage.getItem(`socio0`)){
                for (let socio of socios) {
                    DIV.innerHTML += `
                    <div class="tarjeta">
                        <img src="${socio.results[0].picture.large}">
                        <p><span class="hand-font">Nombre:</span> ${socio.results[0].name.first} ${socio.results[0].name.last}</p>
                        <p><span class="hand-font">Contacto:</span> ${socio.results[0].email}</p>
                        <p><span class="hand-font">País:</span> ${socio.results[0].location.country}</p>
                    </div>
                    `;
                }
                
                BUTTON_FETCH.classList.add('ocultar');
                return;
            } else {
                
            for(let i = 0; i < 3; i++){
                fetch('https://randomuser.me/api/')
                .then(response => response.json())
                .then(data => {
                    localStorage.setItem(`socio${i}`, JSON.stringify(data))
                    DIV.innerHTML += `
                        <div class="tarjeta">
                            <img src="${data.results[0].picture.large}">
                            <p><span class="hand-font">Nombre:</span> ${data.results[0].name.first} ${data.results[0].name.last}</p>
                            <p><span class="hand-font">Contacto:</span> ${data.results[0].email}</p>
                            <p><span class="hand-font">País:</span> ${data.results[0].location.country}</p>
                        </div>
                    `;
    
                });
            };
            BUTTON_FETCH.classList.add('ocultar');
        }
            
    });

});

//registro el service worker
if (navigator.serviceWorker) {
    console.log("ServiceWorker listo para usar");
    navigator.serviceWorker.register('serviceworker.js');
} else {
    console.log('No se puede usar ServiceWorker');
}