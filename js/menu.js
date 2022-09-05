$(document).ready(function(){
    $('.nav-link').click(function(event){
        event.preventDefault()
        
        let url = $(this).attr('href')

        $('#content').empty()
        $('#content').load(url)

    })
})