<?php

namespace App\Http\Controllers;

use App\Equipment_Model;
use App\Equipment_Item;
use App\Measure_Parameters;
use App\Keywords;
use App\Floor;
use App\Location;
use App\Parts;
use App\Lab;
use App\User;
use Session;
use Auth;
use DB;
use Schema;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
//use Request;

use App\Http\Requests;

class ModelController extends Controller
{
    public function index(){
        $floors = Floor::all();
        $admins = User::where('role', 'admin')->get();

    	return view('model.index', compact('floors', 'admins'));
    }
    
    public function equipment_list($id){
        if($id == "offsite"){
           $items = Equipment_Item::where('off_site', 'Yes')->get(); 
        }
        else{
            $items = Equipment_Item::where('current_location_id', $id)->get(); 
        }
        
        $items->load('Equipment_Model');
        $items = $items->sortBy('Equipment_Model.device_name');
       // dd($items);
    	return view('model.equipment_list', compact('items'));
    }
    
    public function equipment_item($id){
    
        $item = Equipment_Item::find($id);
        $model = Equipment_Model::find($item->model_id);
        $parameters = Measure_Parameters::pluck('parameter', 'id');
        $keywords = Keywords::pluck('keyword', 'id');
        
        $parts = Parts::where('item_id',$item->id)->get();
        
        if (Auth::check()){
            $user_info = Auth::user();
            $user_info->load('Labs.Location.Floor');
        }

        $location = Location::find($item->current_location_id);
        $location->load('Floor');
        $lab = Lab::find($item->owned_by_lab_id);
        
        //dd($parts);
    	return view('model.show', compact('model', 'item', 'parameters', 'keywords', 'user_info', 'location', 'lab', 'parts'));
    }
    
    public function search(){
        //$modelColumns = Schema::getColumnListing('equipment_model');
        //$itemColumns = Schema::getColumnListing('equipment_item');
        //$searchFields = collect([['column' => 'All', 'display_name' => 'All Columns', 'table' => NULL]]);
        //foreach($modelColumns as $modelColumn){
        //    $searchFields->push(['column' => $modelColumn, 'display_name' => $modelColumn, 'table' => 'equipment_model']);
        //}
        //foreach($itemColumns as $itemColumn){
        //    $searchFields->push(['column' => $itemColumn, 'display_name' => $itemColumn, 'table' => 'equipment_item']);
        //}
        
        $searchFields = collect([['column' => 'device_name', 'display_name' => 'Class Name', 'table' => 'equipment_model']]);
        
        //$searchFields->push(['column' => 'device_name', 'display_name' => 'Class Name', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'manufacturer', 'display_name' => 'Item Manufacturer', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'description', 'display_name' => 'Class Description', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'guarding_required', 'display_name' => 'Guarding Required', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'guarding_status', 'display_name' => 'Guarding Status', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'safety_pm_status', 'display_name' => 'Safety PM Status', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'lead_battery_acid', 'display_name' => 'Lead Battery Acid', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'hecp_num', 'display_name' => 'HECP Number', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'radiation_status', 'display_name' => 'Radiation Status', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'radiation_type', 'display_name' => 'Radiation Type', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'refrigerant', 'display_name' => 'Refrigerant', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'refrigerant_type', 'display_name' => 'Refrigerant Type', 'table' => 'equipment_model']);
        $searchFields->push(['column' => 'notes', 'display_name' => 'Class Notes', 'table' => 'equipment_model']);
        
        $searchFields->push(['column' => 'parameter_id', 'display_name' => 'Class Parameters', 'table' => 'model_parameters']);
        $searchFields->push(['column' => 'keyword_id', 'display_name' => 'Class Keywords', 'table' => 'model_keywords']);
        
        $searchFields->push(['column' => 'name', 'display_name' => 'Part Name', 'table' => 'parts']);
        $searchFields->push(['column' => 'current_location_id', 'display_name' => 'Lab Number', 'table' => 'equipment_item']);
        
        $searchFields->push(['column' => 'serial_num', 'display_name' => 'Serial Number', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'asset_tag', 'display_name' => 'JJVC Asset Tag', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'workstation_num', 'display_name' => 'Workstation Number', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'calibration_tag', 'display_name' => 'Calibration Tag', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'available', 'display_name' => 'Available', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'off_site', 'display_name' => 'Off Site', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'qualified', 'display_name' => 'Item Qualified', 'table' => 'equipment_item']);
        $searchFields->push(['column' => 'notes', 'display_name' => 'Item Notes', 'table' => 'equipment_item']);
        
        
        $parameters = Measure_Parameters::pluck('parameter', 'id');
        $keywords = Keywords::pluck('keyword', 'id');
        $parts = Parts::pluck('name', 'id');
        $labs = Location::pluck('lab_room_number', 'id');
        
        $parameters = $parameters->sort();
        $keywords = $keywords->sort();
        $parts = $parts->sort();
        $labs = $labs->sort();
        
        $searchFields = $searchFields->sortBy('display_name', SORT_REGULAR);

        
        
    	return view('model.search', compact('searchFields', 'parameters', 'keywords', 'parts', 'labs'));
    }
    
    public function search_results(Request $request){
        //dd($request);
        
        if($request->field == 'parameter_id:model_parameters'){
            $ids = DB::table('model_measureparameters')->where('parameter_id', $request->search)->pluck('model_id');
            $modelIDs = Equipment_Model::has('Measure_Parameters')->whereIn('id', $ids)->get()->pluck('id');
            $items = Equipment_Item::whereIn('model_id', $modelIDs)->get();
            $items->load('Equipment_Model');
        }
        
        
        else if($request->field == 'keyword_id:model_keywords'){
            $ids = DB::table('model_keywords')->where('keyword_id', $request->search)->pluck('model_id');
            $modelIDs = Equipment_Model::has('Keywords')->whereIn('id', $ids)->get()->pluck('id');
            $items = Equipment_Item::whereIn('model_id', $modelIDs)->get();
            $items->load('Equipment_Model');

        }
        
        else if($request->field == 'name:parts'){
            $ids = DB::table('parts')->where('id', $request->search)->pluck('item_id');
            $items = Equipment_Item::where('id', $ids)->get();
            $items->load('Equipment_Model');

        }
        
        else if(substr($request->field, strpos($request->field, ':')+1) == 'equipment_item'){
            $items = Equipment_Item::where([[substr($request->field, 0, strpos($request->field, ':')), 'like', '%'.$request->search.'%'],[substr($request->field, 0, strpos($request->field, ':')), '<>', '']])->get(); 
            $items->load('Equipment_Model');
        }
        else{
            $items = Equipment_Item::whereHas('Equipment_Model', function ($query) {
                    global $request;
                    $column = substr($request->field, 0, strpos($request->field, ':'));
                    $query->where([[$column, 'like', '%'.$request->search.'%'],[$column, '<>', '']]);
            })->get();
            $items->load('Equipment_Model');
        }

        $floors = Floor::all();
        $parameters = Measure_Parameters::pluck('parameter', 'id');
        $keywords = Keywords::pluck('keyword', 'id');
        
        $parts = Parts::pluck('name', 'id');
        
        $location = Location::all();
        $location->load('Floor');
        $lab = Lab::all();
        
        $field = substr($request->field, 0, strpos($request->field, ':'));
        $search = $request->search;
        
        return view('model.summary_view', compact('items', 'parameters', 'keywords', 'floors', 'field', 'search', 'parts', 'location', 'lab'));
    }

    public function new_selector_page(){
    	$models = Equipment_Model::all()->sortBy("device_name");

    	return view('model.new_selector_page', compact('models'));
    }

    public function new_item($id){
    	$model = Equipment_Model::find($id);
        $parameters = Measure_Parameters::pluck('parameter', 'id');
        $keywords = Keywords::pluck('keyword', 'id');
        
        $user_info = Auth::user();
        $user_info->load('Labs.Location.Floor');

            
        //dd($user_info);
        
    	return view('model.new_item', compact('model', 'parameters', 'keywords', 'user_info'));
    }

    public function new_model(){
        $parameters = Measure_Parameters::pluck('parameter', 'id');
        $keywords = Keywords::pluck('keyword', 'id');

    	return view('model.new_model', compact('parameters', 'keywords'));
    }
    
     public function deleteItem(Request $request, Equipment_Model $model, Equipment_Item $item){
        $i = Equipment_Item::find($item->id);
        $deletedRows = Parts::where('item_id', $i->id)->delete();
        $i->delete();
        Session::flash('message', 'Item successfully deleted.');
    		
        return redirect('');
    }
    
    public function addItem(Request $request, Equipment_Model $model){
        
        $this->validate($request, [
            'serial_num' => 'required_without_all:asset_tag|unique:equipment_item,serial_num,NULL,id,model_id,' . $model->id ,
            'asset_tag' => 'required_without_all:serial_num|unique:equipment_item,asset_tag,NULL,id,model_id,' . $model->id
        ]);
        
        //dd($request);
        
    	$item = new Equipment_Item;
        
        //dd($item);
        
        $item->manufacturer = $request->manufacturer;
        $item->serial_num = $request->serial_num;
        $item->asset_tag = $request->asset_tag;
        $item->workstation_num = $request->workstation_num;
        $item->owned_by_lab_id = $request->owned_by_lab_id;
        $item->current_location_id = $request->current_location_id;
        $item->calibration_tag = $request->calibration_tag;
        $item->calibration_due = $request->calibration_due;
        $item->calibration_schedule = $request->calibration_schedule;
        $item->available = $request->available;
        $item->off_site = $request->off_site;
        $item->off_site_location = $request->off_site_location;
        $item->qualified = $request->qualified;

        $item->notes = $request->notes_2;
        $item->entered_by = Auth::user()->id;
        
        $model->Equipment_Items()->save($item);
        
        if(!empty($request->parts)){
            foreach($request->parts as $key=>$value){
                    $p = new Parts;
                    $p->name = $value;
                    $p->item_id = $item->id;

                    $p->save();
            }
        }
        
        Session::flash('message', 'Item Added!');
        
        return back();
    }
    
    public function addModel(Request $request){
        
        //dd($request->input('measure_parameters'));
        
        $this->validate($request, [
            'device_name' => 'required|unique:equipment_model',
            'hecp_num' => 'required'
        ]);
        
    	
        //$item = new Equipment_Item;
        $newModel = new Equipment_Model;
        
        
        $newModel->device_name = $request->device_name;
        $newModel->description = $request->description;
        $newModel->guarding_required = $request->guarding_required;
        $newModel->guarding_status = $request->guarding_status;
        $newModel->safety_pm_status = $request->safety_pm_status;
        $newModel->lead_battery_acid = $request->lead_battery_acid;
        $newModel->hecp_num = $request->hecp_num;
        $newModel->radiation_status = $request->radiation_status;
        $newModel->radiation_type = $request->radiation_type;
        $newModel->refrigerant = $request->refrigerant;
        $newModel->refrigerant_type = $request->refrigerant_type;
        $newModel->refrigerant_amount = $request->refrigerant_amount;
        //$newModel->attachment_file_name = $request->attachment_file_name;
        $newModel->notes = $request->notes;
        $newModel->entered_by = Auth::user()->id;

        $newModel->save();
                
        if(!empty($request->measure_parameters)){
                $array = [];
                foreach($request->measure_parameters as $key=>$value){
                    if(substr($value, 0, 3) == "id="){
                        array_push($array,substr($value, 3));
                    }
                    else{
                        $mp = new Measure_Parameters;
                        $mp->parameter = $value;
                        $mp->save();

                        array_push($array,$mp->id);
                    }
                }
                $newModel->Measure_Parameters()->sync([]);
                $newModel->Measure_Parameters()->sync($array,[]);
            }
            else{
                $newModel->Measure_Parameters()->sync([]);
            }

        
            if(!empty($request->keywords)){
                $array = [];
                foreach($request->keywords as $key=>$value){
                    if(substr($value, 0, 3) == "id="){
                        array_push($array,substr($value, 3));
                    }
                    else{
                        $kw = new Keywords;
                        $kw->keyword = $value;
                        $kw->save();

                        array_push($array,$kw->id);
                    }
                }
                $newModel->Keywords()->sync([]);
                $newModel->Keywords()->sync($array, []);
            }
            else{
                $newModel->Keywords()->sync([]);
            }

   
        Session::flash('message', 'New class successfully added.');
        
        return redirect()->route('new_item', [$newModel]);
    }
    
    
    public function update(Request $request, Equipment_Model $model, Equipment_Item $item){
    	        
        $this->validate($request, [
            'device_name' => 'required|unique:equipment_model,device_name,' . $model->id, 
            'hecp_num' => 'required',
            
            'serial_num' => 'required_without_all:asset_tag|unique:equipment_item,serial_num,' . $item->id . ',id,model_id,' . $model->id ,
            'asset_tag' => 'required_without_all:serial_num|unique:equipment_item,asset_tag,' . $item->id . ',id,model_id,' . $model->id ,

        ]);
        
            $model->device_name = $request->device_name;
            $model->description = $request->description;
            $model->guarding_required = $request->guarding_required;
            $model->guarding_status = $request->guarding_status;
            $model->safety_pm_status = $request->safety_pm_status;
            $model->lead_battery_acid = $request->lead_battery_acid;
            $model->hecp_num = $request->hecp_num;
            $model->radiation_status = $request->radiation_status;
            $model->radiation_type = $request->radiation_type;
            $model->refrigerant = $request->refrigerant;
            $model->refrigerant_type = $request->refrigerant_type;
            $model->refrigerant_amount = $request->refrigerant_amount;
            //$model->attachment_file_name = $request->attachment_file_name;
            $model->notes = $request->notes;
           
            $item->manufacturer = $request->manufacturer;
            $item->serial_num = $request->serial_num;
            $item->asset_tag = $request->asset_tag;
            $item->workstation_num = $request->workstation_num;
            $item->owned_by_lab_id = $request->owned_by_lab_id;
            $item->current_location_id = $request->current_location_id;
            $item->calibration_tag = $request->calibration_tag;
            $item->calibration_due = $request->calibration_due;
            $item->calibration_schedule = $request->calibration_schedule;
            $item->available = $request->available;
            $item->off_site = $request->off_site;
            $item->off_site_location = $request->off_site_location;
            $item->qualified = $request->qualified;
            $item->notes = $request->notes_2;
            $item->entered_by = Auth::user()->id;
        
            $model->save();
            $item->save();
        
            $deletedRows = Parts::where('item_id', $item->id)->delete();
        
            if(!empty($request->parts) && $request->workstation_num != ''){
                foreach($request->parts as $key=>$value){
                        $p = new Parts;
                        $p->name = $value;
                        $p->item_id = $item->id;
                    
                        $p->save();
                }
            }

            
            if(!empty($request->measure_parameters)){
                $array = [];
                foreach($request->measure_parameters as $key=>$value){
                    if(substr($value, 0, 3) == "id="){
                        array_push($array,substr($value, 3));
                    }
                    else{
                        $mp = new Measure_Parameters;
                        $mp->parameter = $value;
                        $mp->save();

                        array_push($array,$mp->id);
                    }
                }
                $model->Measure_Parameters()->sync([]);
                $model->Measure_Parameters()->sync($array,[]);
            }
            else{
                $model->Measure_Parameters()->sync([]);
            }

        
            if(!empty($request->keywords)){
                $array = [];
                foreach($request->keywords as $key=>$value){
                    if(substr($value, 0, 3) == "id="){
                        array_push($array,substr($value, 3));
                    }
                    else{
                        $kw = new Keywords;
                        $kw->keyword = $value;
                        $kw->save();

                        array_push($array,$kw->id);
                    }
                }
                $model->Keywords()->sync([]);
                $model->Keywords()->sync($array, []);
            }
            else{
                $model->Keywords()->sync([]);
            }
            
            Session::flash('message', 'Information successfully updated!');
            
            return back();
    }
    
    
    
    public function editProfile(){
        $u = Auth::user();

    	return view('model.editProfile', compact('u'));
    }
    
    public function updateProfile(Request $request){
        $user = Auth::user();
        $this->validate($request, ['name' => 'required|max:255',
            'jjvc_user_id' => 'required|max:255|unique:users,jjvc_user_id,' . $user->id ,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id]);
        
        $user->name = $request->name;
        $user->jjvc_user_id = $request->jjvc_user_id;
        $user->email = $request->email;
        
        if(!empty($request->password)){
            $this->validate($request, ['password' => 'required|min:6|confirmed']);
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
           
        Session::flash('message', 'Profile successfully updated!');

    	return back();
    }
    
    public function adminPanel(){
    	return view('model.adminPanel');
    }
    
    public function labOwnerPanel(){
        $user = Auth::user();
        $labs = $user->Owned_Lab()->get();
        $users = User::all()->sortBy("name");
        
    	return view('model.labOwnerPanel', compact('labs', 'users'));
    }
    
    public function adminLabOwnerPanel(){
        $user = Auth::user();
        $labs = Lab::all()->sortBy("lab_name");
        $users = User::all()->sortBy("name");
        
    	return view('model.labOwnerPanel', compact('labs', 'users'));
    }
    
    public function verifiedList(){
        $labs = Lab::all()->sortByDesc("mark_location");
        
    	return view('model.verifiedList', compact('labs'));
    }
    
    public function updateLab(Request $request, Lab $lab){
        $this->validate($request, [
            'lab_name' => 'required|unique:lab,lab_name,' . $lab->id ,
            'lab_members' => 'required',
            'lab_room_numbers' => 'required'
        ]);
        
        $l = Lab::find($lab->id);
        $l->lab_name = $request->lab_name;
        
        if(!empty($request->lab_members)){
                $l->Members()->sync([]);
                $l->Members()->sync($request->lab_members,[]);
                $l->Members()->attach([$lab->Lab_Owner->id]);
            }
            else{
                $l->Members()->sync([]);
                $l->Members()->attach([$lab->Lab_Owner->id]);
            }
        $l->save();
        
        $claimedLocations = Location::pluck('lab_room_number');
        $claimedLocations = $claimedLocations->toArray();
        
        $floorIDs = Floor::pluck('id');
        $floorIDs = $floorIDs->toArray();;
        if(!empty($request->lab_room_numbers)){
            $badLocations = [];
            $goodLocations = [];
            foreach($request->lab_room_numbers as $location){
                $floorid = substr($location,0,1);
                if(in_Array($location, $claimedLocations)){
                    $loc = Location::where('lab_room_number', $location)->first();
                    if($loc->lab_id = $lab->id){
                        //do nothing.
                    }
                    else{
                        array_push($badLocations, $location);
                    }
                }
                elseif($location == '' or $location == ' '){
                    array_push($badLocations, $location);
                } 
                elseif(!in_Array($floorid, $floorIDs)){
                    array_push($badLocations, $location);
                } 
                else{
                    $newLocation = new Location;
                    $newLocation->floor_id = $floorid;
                    $newLocation->lab_id = $lab->id;
                    $newLocation->lab_room_number = $location;
                    $newLocation->facilities_room_number = $location;
                    $newLocation->save();
                    array_push($goodLocations, $location);
                }
            }
            $deletedLabLocations = Location::where('lab_id',$lab->id)->whereNotIn('lab_room_number', $request->lab_room_numbers)->get();
            $deletedLabLocations->load('Equipment_Items');
            if(!empty($deletedLabLocations)){
                foreach($deletedLabLocations as $location){
                    if(!is_null($location->Equipment_Items)){
                        if(empty($location->Equipment_Items->pluck('id')->toArray())){
                            $location->delete();
                        }
                        else{
                            //do nothing.
                        }
                    }
                }
            }
        }
        
        $floorIDs = Floor::pluck('id');
        $floorIDs = $floorIDs->toArray();
        $end = end($floorIDs);
        $secondToEnd = prev($floorIDs);
        reset($floorIDs);
        $temp = "";
        foreach ($floorIDs as $value){
            $temp = $temp.$value;
            if($secondToEnd == $value){
                $temp = $temp.", or ";
            }
            else if($end !== $value){
                $temp = $temp.", ";
            }
        }
        
        if(!empty($badLocations) and !empty($goodLocations)){
            Session::flash('alert', 'Lab updated, but one or more locations were entered that started with an invalid floor number. Location numbers must start with a '.$temp.'.');
            return redirect()->to('/');
        }
        else if (!empty($badLocations) and empty($goodLocations)){
            Session::flash('alert', 'Lab not updated since no locations were entered that started with a valid floor number. Location numbers must start with a '.$temp.'.');
            return redirect()->to('/');
        }
        
        Session::flash('message', 'Lab information successfully updated!');
        return back();
    }
    
    public function markLab(Request $request, Lab $lab){
        $l = Lab::find($lab->id);
        $l->mark_location = Carbon::now();
        $l->save();
        Session::flash('message', 'Mark Location successfully updated!');
        return back();
    }
    
    public function labTransferPanel(Lab $lab){
        $lab = Lab::find($lab->id);
        $users = User::all()->sortBy("name");
        return view('model.labTransferPanel', compact('lab', 'users'));
    }
    
    public function transferLab(Request $request, Lab $lab){
        $lab = Lab::find($lab->id);
        $lab->lab_owner_id = $request->lab_owner;
        $lab->save();
        $lab->Members()->detach([$lab->Lab_Owner->id]);
        $lab->Members()->attach([$lab->Lab_Owner->id]);
        Session::flash('message', 'Lab successfully transfered to new lab owner!');
        return redirect()->to('/');
    }
    
    public function newLabPanel(){
        $users = User::all()->sortBy("name");
        return view('model.newLabPanel', compact('users'));
    }
    
    public function addNewLab(Request $request){
        $this->validate($request, [
            'lab_name' => 'required|unique:lab,lab_name',
            'lab_owner' => 'required',
            'lab_room_numbers' => 'required'
        ]);
        
        $l = new Lab;
        $l->lab_name = $request->lab_name;
        $l->lab_owner_id = $request->lab_owner;
        
        $claimedLocations = Location::pluck('lab_room_number');
        $claimedLocations = $claimedLocations->toArray();
        
        $floorIDs = Floor::pluck('id');
        $floorIDs = $floorIDs->toArray();;
        
        $badLocations = [];
        $goodLocations = [];
        foreach($request->lab_room_numbers as $location){
            $floorid = substr($location,0,1);
            if(in_Array($location, $claimedLocations)){
                $loc = Location::where('lab_room_number', $location)->first();
                if($loc->lab_id = $l->id){
                    //do nothing.
                }
                else{
                    array_push($badLocations, $location);
                }
            }
            elseif($location == '' or $location == ' '){
                array_push($badLocations, $location);
            } 
            elseif(!in_Array($floorid, $floorIDs)){
                array_push($badLocations, $location);
            } 
            else{
                $l->save();
                $newLocation = new Location;
                $newLocation->floor_id = $floorid;
                $newLocation->lab_id = $l->id;
                $newLocation->lab_room_number = $location;
                $newLocation->facilities_room_number = $location;
                $newLocation->save();
                array_push($goodLocations, $location);
            }
        }
        
        $floorIDs = Floor::pluck('id');
        $floorIDs = $floorIDs->toArray();
        $end = end($floorIDs);
        $secondToEnd = prev($floorIDs);
        reset($floorIDs);
        $temp = "";
        foreach ($floorIDs as $value){
            $temp = $temp.$value;
            if($secondToEnd == $value){
                $temp = $temp.", or ";
            }
            else if($end !== $value){
                $temp = $temp.", ";
            }
        }
        
        if (!empty($badLocations) and empty($goodLocations)){
            Session::flash('alert', 'Lab not created since no locations were entered that started with a valid floor number. Location numbers must start with a '.$temp.'.');
            return redirect()->to('/');
        }
        
        if(!empty($request->lab_members)){
                $l->Members()->sync([]);
                $l->Members()->sync($request->lab_members,[]);
                $l->Members()->attach([$l->Lab_Owner->id]);
            }
            else{
                $l->Members()->sync([]);
                $l->Members()->attach([$l->Lab_Owner->id]);
            }
        
        if(!empty($badLocations) and !empty($goodLocations)){
            Session::flash('alert', 'Lab created, but one or more locations were entered that started with an invalid floor number. Location numbers must start with a '.$temp.'.');
            return redirect()->to('/');
        }
        
        Session::flash('message', 'Lab and locations successfully created!');
        return back();
    }
    
    public function editUserPanel(){
        $users = User::all()->sortBy("name");
        return view('model.editUserPanel', compact('users'));
    }
    
    public function updateUser(Request $request, User $user){
        $user = User::find($user->id);
        $this->validate($request, ['name' => 'required|max:255',
            'jjvc_user_id' => 'required|max:255|unique:users,jjvc_user_id,' . $user->id ,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id]);
        
        $user->name = $request->name;
        $user->jjvc_user_id = $request->jjvc_user_id;
        $user->email = $request->email;
        $user->role = $request->role;
        
        if(!empty($request->password)){
            $this->validate($request, ['password' => 'required|min:6|confirmed']);
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
        Session::flash('message', 'User info successfully updated!');
        return back();
    }
    
    public function deleteLab(Request $request, Lab $lab){
        $i = Lab::find($lab->id);
        if(count($i->Equipment_Items) == 0){
            $locations = Location::where('lab_id',$i->id);
            foreach($locations as $l){
                $l.delete();
            }
            $i->Members()->sync([]);
            $i->delete();
            Session::flash('message', 'Lab successfully deleted.');
        }
        else{
            Session::flash('alert', 'Lab can not be deleted since it still contains equipment items. Move or delete these items before deleting this lab.');
        }
    		
        return redirect()->to('/');
    }
    
    public function deleteUser(Request $request, User $user){
        $i = User::find($user->id);
        if($i->role == "admin"){
            Session::flash('alert', 'User not deleted because they are set as an admin. To prevent accidental deletions of admins, please remove admin rights for this user before deleting them and try again.');
            return back();
        }
        else if(count($i->Owned_Lab)!=0){
            Session::flash('alert', 'User not deleted because they own one or more labs. Please transfer these labs to a different user before deleting the account and try again.');
            return back();
        }
        else{
            $i->delete();
            Session::flash('message', 'User successfully deleted.');
            return redirect()->to('/');
        }
    }
    
    public function passwordResetForm(){
        return view('auth.resetPassword');
    }
    
    public function resetPassword(Request $request){
        $this->validate($request, ['email' => 'required|email']);
        $user = User::where('email', '=', $request->email)->first();
        
        if(!empty($user)){
            $this->validate($request, ['password' => 'required|min:6|confirmed']);
            $user->password = bcrypt($request->password);
            $user->remember_token = "";
            $user->save();
            Session::flash('message', 'Your password has been reset. Please try logging in now.');
            return redirect()->to('/login');
        }
        else{
            Session::flash('alert', 'No user with this email address was found in our records. Please try again or contact an administrator');
            return redirect()->to('/password/reset');
        }
    }
}
