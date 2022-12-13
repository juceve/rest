$('.delete').submit(function (e) {
    e.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Eliminar Registro!',
        text: "Esta seguro de realizar la operación?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, elimínalo!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            loading();
            this.submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Operación cancelada',
                'No se modificó ningún registro',
                'error'
            )
        }
    })
});

$('.desactivar').submit(function (e) {
    e.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Modificar Estado!',
        text: "Esta seguro de realizar la operación?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, continuar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            loading();
            this.submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Operación cancelada',
                'No se modificó ningún registro',
                'error'
            )
        }
    })
});

$(document).ready(function () {
    $('.dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },

    });

    $('.select2').select2();
});
function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function loading(){
    $("#loading").removeClass("d-none");
}

function finLoading(){
    $("#loading").addClass("d-none");
}