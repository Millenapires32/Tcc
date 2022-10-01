$(document).ready(function(){

    $('#table-animais').on('click', 'button.btn-delete', function(e){
        e.preventDefault()

        let ID = `ID=${$(this).attr('id')}`

        Swal.fire({
            title: 'Projeto CED',
            text: 'Deseja realmente excluir este pet?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'SIM',
            cancelButtonText: 'NÃO' 
        }).then((result) => {
            if(result.value){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: ID,
                    url: 'src/animais/modelo/delete-animais.php',
                    success: function(dados){
                        Swal.fire({
                            title: 'Projeto CED',
                            text: dados.mensagem,
                            icon: dado.tipo,
                            confirmButtonText: 'OK'
                        })
                        $('#table-animais').DataTable().ajax.reload()
                    }
                })
     }
})
})
})