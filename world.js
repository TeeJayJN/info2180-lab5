$(document).ready(function(){
    const btn = $('#lookupCntry');
    const btn2 = $('#lookupCty');

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

    btn2.click(function(){
        const query = $('#country').val().trim();

        $.ajax({
            url: 'world.php',
            method: 'GET',
            dataType:  'html',
            data: {query: query, lookup: 'cities'},
            success: function(response){
                $('#result').html(response);
            }
        });
    });
});