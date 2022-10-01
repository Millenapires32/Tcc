$(document).ready(function() {
    $('#table-tipo').on('click', 'button.btn-edit', function(e) {
      e.preventDefault()
          // Limpar todas as informações ja existentes na modal
          $('.modal-title').empty()
          $('.modal-body').empty()
  
          // Incluir novos textos no cabeçalho na janela modal
          $('.modal-title').append('Editar registro')
  
          let ID = `ID=${$(this).attr('id')}`
  
          $('.btn-save').removeAttr('data-operation')
  
          $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: ID,
            url: 'src/tipo/modelo/view-noticia.php',
            success: function (dado) {
              if(dado.tipo == 'success') {
                $('.modal-body').load('src/noticia/visao/form-noticia.html', function () {
                  $('#Titulo').val(dado.dados.Titulo)
                  $('#Data').val(dado.dados.Data)
                  $('#Descricao').val(dado.dados.Descricao)
                  $('#ID').val(dado.dados.ID)
                })
                $('.btn-save').show()
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