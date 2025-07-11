
document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const mensaje = params.get('mensaje');

    if (mensaje) {
        let texto = '';
        switch (mensaje) {
            case 'Correcto':
                texto = '¡Registro exitoso!';
                break;
            case 'Duplicado':
                texto = 'Este usuario ya estaba registrado.';
                break;
            case 'Error':
                texto = 'Ocurrió un error al registrar.';
                break;
            case 'SinConexion':
                texto = 'No se pudo conectar a la base de datos.';
                break;
            default:
                texto = 'Ocurrió un error desconocido.';
        }

        document.getElementById('mensajeTexto').innerText = texto;
        const modal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        modal.show();
    }
});

