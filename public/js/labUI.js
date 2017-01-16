$(document).ready(function () {
    
    $floorID = $("#current_location_id").val();
    $labID = $("#owned_by_lab_id").val();
    
    $("#current_location_id").children('option').hide();
    $("#current_location_id").children('option').prop('disabled', true);
    $("#current_location_id").children('.labID'+$labID).show();
    $("#current_location_id").children('.labID'+$labID).prop('disabled', false);

    $labID = $("#current_location_id").val();
    $("[id=current_floor]").hide();
    $("#current_floor.labID"+$labID).show();

    
    $("#owned_by_lab_id").on("change", function() {
        $labID = $("#owned_by_lab_id").val();

        $("#current_location_id").children('option').hide();
        $("#current_location_id").children('option').prop('disabled', true);
        $("#current_location_id").children('.labID'+$labID).show();
        $("#current_location_id").children('.labID'+$labID).prop('disabled', false);

        $("#current_location_id").val($("#current_location_id option:not([disabled])").val());
        
        $("[id=current_floor]").hide();
        $("#current_floor.labID"+$labID).show();
    });
    
    $("#current_location_id").on("change", function() {
        $labID = $("#current_location_id").val();
        $("[id=current_floor]").hide();
        $("#current_floor.labID"+$labID).show();
    });
    
    
});