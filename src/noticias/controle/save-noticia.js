$(document).ready(function() {
    $('.btn-save').click(function(e) {
        e.preventDefault()

        let dados = $('#form-noticia').serialize()

        dados += `&operacao=${$('.btn-save').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: 'src/tipo/modelo/save-noticia.php',
            success: function(dados) {
                Swal.fire({
                    title: 'Projeto CED',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-noticia').modal('hide')
                $('#table-tipo').DataTable().ajax.reload()
            }
        })
    })
})