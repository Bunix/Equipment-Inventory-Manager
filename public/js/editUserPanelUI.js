$(document).ready(function () {
    $userID = $("#field").val();
    $(".user").hide();
    $("#user-"+$userID).show();
    
    $("#field").on("change", function() {
        $userID = $("#field").val();
        $(".user").hide();
        $("#user-"+$userID).show();
    });
    
});