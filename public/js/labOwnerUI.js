$(document).ready(function () {
    $labID = $("#field").val();
    $(".owner-panel").hide();
    $("#owner-panel-"+$labID).show();
    
    $("#field").on("change", function() {
        $labID = $("#field").val();
        $(".owner-panel").hide();
        $("#owner-panel-"+$labID).show();
    });
    
});