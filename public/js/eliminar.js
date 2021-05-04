document.getElementById("eliminar").addEventListener("click", function(e) {
    e.preventDefault();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podras deshacer esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminalo!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            
            this.submit();

        }
    })
});