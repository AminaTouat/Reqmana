<?php

namespace App\Http\Controllers\Backend;

use App\Charts\DashboardChart;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        $chart = new DashboardChart();
        $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());
        $users = [];

        foreach ($days as $day){
            $users = User::whereDate('created_at', $day)->where('id', Auth::id())->count();
        }

        $chart->dataset('Registered Users', 'line', $users);
        $chart->labels($days);

        return view('dashboard.index', compact('chart'));
    }

    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }
    }

    public function UserView($id){
    	// $allData = User::all();
    	$data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$id)->get();
		$projet = Projet::find($id);
		$resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
    	return view('backend.user.view_user',$data,compact('resultat','projet'));

    }


    public function UserAdd($id){
		$projet = Projet::find($id);
		$resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
    	return view('backend.user.add_user',compact('resultat','projet'));
    }
    public function UserExistAdd($id){
		$projet = Projet::find($id);
		$resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
    	return view('backend.user.add_user_exist',compact('resultat','projet'));
    }


    public function UserStore(Request $request,$projet_id){

    	$validatedData = $request->validate([
    		'email' => 'required|unique:users',
    		'name' => 'required',
    	]);

    	$data = new User();
        $data->role = $request->role;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($request->password);
        $data->save();
    	$data->projets()->save(Projet::Find($projet_id));
		
		
    	

    	$notification = array(
    		'message' => 'User Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('user.view',$projet_id)->with($notification);

    }



    public function UserEdit($id){
    	$editData = User::find($id);
    	return view('backend.user.edit_user',compact('editData'));

    }



    public function UserUpdate(Request $request, $id,$projet_id){

    	$data = User::find($id);
    	$data->name = $request->name;
    	$data->email = $request->email;
        $data->role = $request->role;
    	$data->save();

    	$notification = array(
    		'message' => 'User Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view',$projet_id)->with($notification);

    }



    public function UserDelete($id,$projet_id){
    	$user = User::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'User Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view',$projet_id)->with($notification);

    }

	public function GetUser(Request $request){

		$email = $request->email;

		 $data = User::where('email', 'like', '%' . $email . '%')->get();
		 $html = [];
		 $html['thsource'] = "";
    	 $html['thsource'] .= '<th> Email</th>';
    	 $html['thsource'] .= '<th>Name</th>';
    	 $html['thsource'] .= '<th>Role</th>';
		 $html['thsource'] .= '<th>Select</th>';
    	

		 
    	 foreach ($data as $key => $attend) {
			if($data !=null) {
				$checked = '';
			}else{
				$checked = 'checked';
			}  

			$html[$key]=[];
			$html[$key]['tdsource'] = '<td>'.$attend['email'].'</td>';
			$html[$key]['tdsource'] .= '<td>'.$attend['name'].'</td>';
			$html[$key]['tdsource'] .= '<td>'.'<select name="role" id="role" required=""
			class="form-control" style="width: fit-content;">'.' <option value="role" selected="" disabled="">Select role
			</option>'.' <option value="stakeholders">stakeholders</option>'.'<option value="customer">customer</option>'.
			'</td>';
			
 	
 	
 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="user_id" value="'.$attend->id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

      } // end foreach
    	return response()->json(@$html);


    } // end Method
	public function UserprojetStore(Request $request,$projet_id){

    	$email = $request->email;
		$id = $request->user_id;
		$role=$request->role;

    	$checkdata = $request->checkmanage;
		// $this->validate($request, [
		// 	'user_id' =>'required|unique:user_projet,user_id,NULL,NULL,projet_id,'.$request['projet_id'],
		// 	'projet_id' =>'required|unique:user_projet,projet_id,NULL,NULL,user_id,'.$request['user_id'],
		// ]);

    	if ($checkdata !=null) {
    		for ($i=0; $i <count($checkdata) ; $i++) { 
				$data = User::Find($id);
				$data->projets()->save(Projet::Find($projet_id), ['inv'=>'0','role'=>$role]);
    		} 
    	} // end if 

    	if (!empty(@$data) || !empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('user.view',$projet_id)->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 

    } 



}
