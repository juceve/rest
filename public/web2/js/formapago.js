Livewire.on('alertDanger', function () {
    Swal.fire({        
        position: 'center',
        text: 'Estudiante no encontrado',
        color: '#943126',
        background: '#F5B7B1',
        showConfirmButton: false,

        timer: 1200
    })
});

Livewire.on('alertError', th => {
    Swal.fire(
        'Error!',
        'No se generó la transacción',
        'error'
    )
});

Livewire.on('alertComprobante', th => {
    Swal.fire(
        'Atención!',
        'Debe adjuntar un comprobante.',
        'warning'
    )
});

Livewire.on('alertWarning', msg => {
    Swal.fire(
        'Atención!',
        msg,
        'warning'
    )
});