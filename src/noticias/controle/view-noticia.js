$(document).ready(function() {
  $('#table-tipo').on('click', 'button.btn-view', function(e) {
    e.preventDefault()
        // Limpar todas as informações ja existentes na modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        // Incluir novos textos no cabeçalho na janela modal
        $('.modal-title').append('Visualizar noticia')

        let ID = `ID=${$(this).attr('id')}`

        $.ajax({
          type: 'POST',
          dataType: 'json',
          assync: true,
          data: ID,
          url: 'src/noticia/modelo/view-noticia.php',
          success: function (dado) {
            if(dado.tipo == 'success') {
              $('.modal-body').load('src/noticia/visao/form-noticia.html', function () {
                $('#Titulo').val(dado.dados.Titulo)
                $('#Titulo').attr('readonly', 'true')
                $('#Data').val(dado.dados.Data)
                $('#Data').attr('readonly', 'true')
                $('#Descricao').val(dado.dados.Descricao)
                $('#Descricao').attr('readonly', 'true')
              })
              $('.btn-save').hide()
              $('#modal-noticia').modal('show')
            } else {
              Swal.fire({
                title: 'Projeto CED',
                text: dados.mensagem,
                icon: dados.tipo,
                confirmButtonText: 'OK'
            })
            }
          }
        })
  })
})