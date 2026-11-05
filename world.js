$(document).ready(function(){
    const btn = $('#lookup');
    btn.click(function(){
        const query = $('#country').val().trim();

        $.ajax({
            url: 'world.php',
            method: "GET",
            dataType: "html",
            data: {query: query},
            success: function(response){
                $('#result').html(response);
            }
        });
    });
});