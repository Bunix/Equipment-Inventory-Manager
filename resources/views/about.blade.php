@extends('layout')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">About This Application</div>
        <div class="panel-body">
            Clicking on "Manage Existing Equipment" will bring you to the main page where you can view or modify existing equipment that has already been entered into the system. This link will appear for everyone and everyone, including quests, can use this feature.
            <br><br>
            Use the location filter dropdown menu on the left of the main page to pull up a list of equipment currently set for that location. Lab numbers with no equipment in it will show up as disabled/greyed out.
            <br><br>
            All users and quests have access to this feature without logging into the application. Adding or modifying any equipment requires the user to be logged in and added to a lab by a lab owner or admin.
            <br><br>
            Once you select the floor and lab number you are interested in, a list of equipment in that location will show up in the middle. Select the equipment item you are interested in viewing and the equipment class information and the specific equipment item information will appear on the right. You are able to see all the equipment in the system ut are only able to edit the equipment if you are a member of the lab the equipment belongs to.
            <br><br>
            If you are logged in and a member of the equipment's lab, at the bottom of the page 3 buttons will show up where you can save the chagnes you have made, cancle the changes, or delete the item.
            <br><br>
            Once you are registered and a lab owner or admin has added you to one or more labs, the "Add New Equipment" option will show up in the top navigation bar. Here you will be able to add new equipment items to any lab you belong to. Simply choose an existing equipment class the item is to pre-populate the class information fields with that information, and just enter in the specific details for the individual equipment item, or, if the item does not already have an existing class type, select "Create New Class" to create a new class of items. Once the new class is created, you can add the new item or items to that class.
            <br><br>
            Both the Measure Parameter and Keywords fields for the equipment classes use a tag system where you are able to select any existing tags that may have already been entered into the system, or if the parameter or keyword you'd like to add isn't in the dropdown list, you can type in your own and hit enter to create a new tag.
            <br><br>
            The search page allows you to select from a dropdown list of fields to search from. Fields default to a text-box where you can enter anything for the system to try to find items matching that search. If the field is a boolean (yes/no) option, then the search box will be replaced with simple yes and no radio buttons to choose from. Part names, lab numbers, measure parameters, and keyword search fields replace the text-box with a dropdown list populated with all the possible options to select from.
            <br><br>
            For text-box based searches, if you leave the search box blank, the search results will return all items that have a non-empty value for that field, i.e., it'll return all items with something entered, doesn't matter what that may be.
            <br><br>
            Search results are shown in a summary view, where it is a table of all the fields in the system for quick lookups.
            <br><br>
            You can use the Order Filter radio buttons above the summary view table to narrow down the number of collumns being displayed, from all, to only the relevant safety fields, to only the relevant metrology fields.
            <br><br>
            If you want to export this summary view table to Excel, simply copy and paste the entire table to Excel and it'll format everythibg correctly without any problems.
            <br><br>
            In the summary view, if you want to see/edit one specific item from the search results, simply clikc on the blue Equipment link in the Equipment collumn and it'll show the familiar form where you can view, and if you are a member of the lab the equipment belongs to, edit the equipment information.
            <br><br>
            If you need any additional help, please contact the admins (@include('model.adminList')) or your lab manager for more info.
        </div>
</div>

@stop