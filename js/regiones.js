// Función para confirmar la eliminación
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar esta región?");
        }
        // Asignar la función de confirmación al botón de eliminar
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function (event) {
                if (this.querySelector('button[name="btn_eliminar"]')) {
                    if (!confirmarEliminacion()) {
                        event.preventDefault(); // Evita que se envíe el formulario si el usuario cancela
                    }
                }
            });
        });

// Función para confirmar la modificación
        function confirmarModificacion() {
            return confirm("¿Estás seguro de que deseas modificar esta región?");
        }
        // Asignar la función de confirmación al botón de modificar
        document.getElementById('btn_modificar').addEventListener('click', function(event) {
            if (!confirmarModificacion()) {
                event.preventDefault(); // Evita que se envíe el formulario si el usuario cancela
            }
        });