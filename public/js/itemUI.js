$(document).ready(function () {

    if($("input[name=off_site]:checked").val()=="No"){
    $("#off_site_location").hide();
    }
    
    $("input[name=off_site]").on("change", function() {
        if($("input[name=off_site]:checked").val()=="Yes"){
            $("#off_site_location").show();
        }
        else{
            $("#off_site_location").hide();
            $("#off_site_location input").val("");
        }
    });
    
    
    if($("input[id=calibration_tag]").val()==""){
        $("#calibration_due").hide();
        $("#calibration_schedule").hide();
    }
    $("input[id=calibration_tag]").on('input', function(){
        if($("input[id=calibration_tag]").val()!=""){
            $("#calibration_due").show();
            $("#calibration_schedule").show();
        }
        else{
            $("#calibration_due").hide();
            $("#calibration_due").val("");
            $("#calibration_schedule").hide();
            $("#calibration_schedule").val("");
        }
    });
    
    
    
    if($("input[id=workstation_num]").val()==""){
        $("#parts-div").hide(1);
    }
    $("input[id=workstation_num]").on('input', function(){
        if($("input[id=workstation_num]").val()!=""){
            $("#parts-div").show();
        }
        else{
            $("#parts-div").hide();
        }
    });
});