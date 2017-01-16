$(document).ready(function () {
    var filter = $('input[name=filter]:checked').val();
    $(".table").hide();
    $("#"+filter).show();
    $('input[type=radio][name=filter]').change(function() {
        var filter = $('input[name=filter]:checked').val();
        $(".table").hide();
        $("#"+filter).show();
    }); 
});