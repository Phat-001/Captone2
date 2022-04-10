$(Document).ready(function(){
    // console.log('hi there');
    $("#address_search").change(function(){
        var address_txt = $("#address_search").val();
        $.post('ajax.php',{data_a:address_txt},function(data_a){
            $('#search_result').html(data_a);
        })
    });
    $("#search_job").keyup(function(){
                var txt = $("#search_job").val();
                $.post('ajax.php',{data:txt},function(data){
                    $('#search_result').html(data);
                })
    });
    
    
});