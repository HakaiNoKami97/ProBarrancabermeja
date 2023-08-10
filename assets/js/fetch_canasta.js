window.addEventListener('load', () => {

    let button = document.getElementById('formulario_email');
    let nombre_js = document.getElementById('nombre');
    let empresa_js = document.getElementById('empresa');
    let correo_js = document.getElementById('correo');
    let numero_js = document.getElementById('numero');
    let idea_js = document.getElementById('idea');

    function data() {

        let datos = new FormData();
        datos.append("nombre_fetch", nombre_js.value);
        datos.append("empresa_fetch", empresa_js.value);
        datos.append("correo_fetch", correo_js.value);
        datos.append("numero_fetch", numero_js.value);
        datos.append("idea_fetch", idea_js.value);
        fetch('forms/canasta.php', {
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
        .then(({ success }) => {
            if (success === 1) {
                alerta_success();
                formulario_email.reset();
            } else {
                alerta_fail();
            }
        });

    }

    function alerta_success() {
        Swal.fire(
            'Envio Exitoso',
            'success'
          )
    } 

    function alerta_fail() {
        Swal.fire({
            icon: 'error',
            title: 'Envio Fallido',
          })
    } 

    button.addEventListener('submit', (e) => {
        e.preventDefault();
        data();
    });

});