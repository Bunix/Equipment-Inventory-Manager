## Equipment Inventory Manager

The Equipment Inventory Manager is a PHP based web applicatipn using the [Laravel](http://laravel.com) framework to create an easy to use lab equipment tracking and managment system. Users can register and be added to one or more labs/departments and are then able to add, modify, or delete the equipment in that lab. The main page consists of a location tree selector to display a list of equipment in all the labs, and are able to view equipment that is in labs they do not belong to (but not modify them in any way). 

The home screen serves as a single-page web application where once the desired lab is selected from the expanding tree view, an AJAX call is made to generate the equipment list for that lab to thr right of it. Then users can select the equipment they want to view and another AJAX call is made to display all the equipment class and item information on the right half of the page.

Users are able to add new classes of items, as well as add specific individual items to those classes. This helps reduce redundant information and any updates to the class information gets applied to all the items in that particular class automatically. 

There is an advanced search functionality where users can select from a list of fields to find all equipment items that match the search term entered, and displays all the information in a table summary view where what is shown can be changed depending on the type of information relevant to that particular user. 

There are admin and lab owner panels for managing the users and labs in the application that makes adding new labs, locations, lab owners, lab members, and roles easy to do.

The application uses PHP, Laravel 5.3, Bootstrap, JQuery/Javascript, Select2 for keyword and parameter tagging support, HTML5 and CSS3. 

