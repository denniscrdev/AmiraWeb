const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');

const ruc = document.querySelector('#ruc');
const nombre = document.querySelector('#nombre');
const correo = document.querySelector('#correo');
const telefono = document.querySelector('#telefono');
const direccion = document.querySelector('#direccion');

const errorRuc = document.querySelector('#errorRuc');
const errorNombre = document.querySelector('#errorNombre');
const errorTelefono = document.querySelector('#errorTelefono');
const errorCorreo = document.querySelector('#errorCorreo');
const errorDireccion = document.querySelector('#errorDireccion');

document.addEventListener('DOMContentLoaded', function () {
    // Inicializar un Editor
    ClassicEditor
        .create(document.querySelector('#mensaje'), {
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
        })
        .catch(error => {
            console.error(error);
        });

    // Actualizar datos
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        errorRuc.textContent = '';
        errorNombre.textContent = '';
        errorTelefono.textContent = '';
        errorCorreo.textContent = '';
        errorDireccion.textContent = '';

        if (ruc.value == '') {
            errorRuc.textContent = 'EL RUC ES REQUERIDO';
        } else if (nombre.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
        } else if (correo.value == '') {
            errorCorreo.textContent = 'EL CORREO ES REQUERIDO';
        } else if (telefono.value == '') {
            errorTelefono.textContent = 'EL TELEFONO ES REQUERIDO';
        } else if (direccion.value == '') {
            errorDireccion.textContent = 'LA DIRECCIÓN ES REQUERIDA';
        } else {
            const url = base_url + 'admin/modificar';

            // 🔹 Mostrar Loading de Notiflix
            Notiflix.Loading.standard('Actualizando datos...');

            // 🔹 Mantener el loading 3 segundos
            setTimeout(() => {
                Notiflix.Loading.remove();

                // Aquí se ejecuta la función que ya muestra el toast con Swal
                insertarRegistros(url, this, null, btnAccion, false);

            }, 2000);
        }
    });
});
