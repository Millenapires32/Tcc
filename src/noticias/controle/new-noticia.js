$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        // Limpar todas as informações ja existentes na modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        // Incluir novos textos no cabeçalho na janela modal
        $('.modal-title').append('Adicionar novo registro')

        // Incluir o nosso formulário dentro do corpo da nossa janela modal
        $('.modal-body').load('src/noticia/visao/form-noticia.html')

        // Iremos incluir uma função no botão salvar para demonstrar que é um novo registro
        $('.btn-save').attr('data-operation', 'insert')

        // Abrir a nossa janela modal
        $('#modal-noticia').modal('show')
    })
})