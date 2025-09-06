// ==============================
// SELECCIÓN DE ELEMENTOS DEL DOM
// ==============================
const formulario = document.querySelector("#formulario");
const correo = document.querySelector("#correo");
const clave = document.querySelector("#clave");
const errorCorreo = document.querySelector("#errorCorreo");
const errorClave = document.querySelector("#errorClave");

// ==============================
// INICIO DEL SCRIPT
// ==============================
document.addEventListener("DOMContentLoaded", function () {
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        // Limpiamos errores previos
        errorCorreo.textContent = "";
        errorClave.textContent = "";

        // Validaciones
        if(correo.value.trim() == ""){
            errorCorreo.textContent = "EL CORREO ES REQUERIDO";
        } else if(clave.value.trim() == ""){
            errorClave.textContent = "LA CONTRASEÑA ES REQUERIDA";
        } else {
            const url = base_url + "home/validar";
            const data = new FormData(this);
            const http = new XMLHttpRequest();
            http.open("POST", url, true);

            // ==============================
            // <<<=== PARTE EDITADA: activamos precarga antes de enviar
            // ==============================
            fncMatPreloader("on");

            http.send(data);

            http.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);

                    // ==============================
                    // <<<=== PARTE EDITADA: preloader visible mínimo 2 segundos
                    // ==============================
                    setTimeout(() => {
                        fncMatPreloader("off"); // quita la barra de precarga

                        // Mostramos alerta
                        Swal.fire({
                            title: "mensaje",
                            text: res.msg,
                            icon: res.type
                        });

                        // Si login es correcto
                        if(res.type == 'success'){
                            setTimeout(() => {
                                let timerInterval;
                                Swal.fire({
                                    title: res.msg,
                                    html: "Será redireccionado en <b></b> milliseconds.",
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const timer = Swal.getPopup().querySelector("b");
                                        timerInterval = setInterval(() => {
                                            timer.textContent = `${Swal.getTimerLeft()}`;
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then((result) => {
                                    if(result.dismiss === Swal.DismissReason.timer){
                                        window.location = base_url + 'admin';
                                    }
                                });
                            }, 2000);
                        }

                    }, 2000); // <<<=== fuerza que precarga dure al menos 2 segundos
                }
            };
        }
    });
});
