
// ==============================
// HERRAMIENTA TOOLTIP (Dark Panel)
// ==============================
document.addEventListener("DOMContentLoaded", function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// ==============================
// FUNCIÓN DE PRECARGA
// ==============================
function fncMatPreloader(type){
    var preloader = new $.materialPreloader({
        position: 'top',
        height: '5px',
        col_1: '#159756',
        col_2: '#da4733',
        col_3: '#3b78e7',
        col_4: '#fdba2c',
        fadeIn: 200,
        fadeOut: 200
    });

    if(type == "on"){
        preloader.on(); // activa la barra de precarga
    }

    if(type == "off"){
        $(".load-bar-container").remove(); // quita la barra de precarga
    }
}

/*=============================================
Mostrar / Ocultar Contraseña
=============================================*/

function fncTogglePassword() {
    const input = document.querySelector("#clave");
    const toggleBtn = document.querySelector("#togglePassword");

    if (!input || !toggleBtn) return;

    toggleBtn.addEventListener("click", function () {
        const icon = this.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            if (icon) {
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        } else {
            input.type = "password";
            if (icon) {
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    });
}

document.addEventListener("DOMContentLoaded", fncTogglePassword);

