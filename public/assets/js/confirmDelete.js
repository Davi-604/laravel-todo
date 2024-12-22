function confirmDelete(event, url, title) {
    event.preventDefault();

    Swal.fire({
        title,
        text: 'Essa ação não pode ser desfeita!',
        icon: 'warning',
        showCancelButton: true,
        color: '#fff',
        background: '#312d81',
        iconColor: '#4f47e6',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#4f47e6',
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
