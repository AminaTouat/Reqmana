<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\Exigence;
use App\Models\Projet;
use App\Models\User;
use Auth;
use App\Models\Link;
class requirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $projet = Projet::find($id);
        $exigences = Requirement::where('projet_id' , $id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.Srequirements.requirements_view' , compact('resultat','exigences','projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $projet = Projet::find($id);
        $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        //  $exigence = Exigence::get();
        return view('backend.Srequirements.requirements_add' ,$data,compact('resultat','projet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = new Requirement();
        $data->requirementType = $request->requirementType;
        $data->importance = $request->importance;
        $data->entredBy = $request->entredBy;
        $data->source = $request->source;
        $data->fitC = $request->fitC;
        $data->summary = $request->summary;
        $data->body = $request->body;
        if($data->requirementType!= null && $data->importance!=null && $data->entredBy!=null && $data->source!=null && $data->summary!=null && $data->body!=null){
            $data->status = "Implemented";
        }
        else  $data->status = "Draft";
        $data->projet_id = $request->projet_id;
       
    	$data->save();
        
        $id=$request->projet_id;
        $notification = array(
            'message' => 'Software requirement created successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('Srequirements.view',$id)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editData = Requirement::find($id);
        $links = Link::where('exigence_id' , $id)->get();;
        $id = $editData->projet_id;
        $projet = Projet::find($id);
        $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.Srequirements.requirements_edit',$data,compact( 'resultat','editData','projet','links'));
        //
    }
    public function detail($id)
    {
        $editData = Requirement::find($id);
        $id = $editData->projet_id;
        $projet = Projet::find($id);
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.Srequirements.requirements_detail',compact('resultat','editData','projet'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Requirement::find($id);
        $data->requirementType = $request->requirementType;
        $data->importance = $request->importance;
        $data->entredBy = $request->entredBy;
        $data->source = $request->source;
        $data->fitC = $request->fitC;
        $data->summary = $request->summary;
        $data->body = $request->body;
        if($data->requirementType!= null && $data->importance!=null && $data->entredBy!=null && $data->source!=null && $data->summary!=null && $data->body!=null){
            $data->status = "Implemented";
        }
        else  $data->status = "Draft";
        
    	$data->save();
        $id=$request->projet_id;
    	$notification = array(
    		'message' => 'Software requirement Updated Successfully',
    		'alert-type' => 'info'
    	);
    
    	return redirect()->route('Srequirements.view',$id)->with($notification);
    }
    public function valide(Request $request, $id){
        $data = Requirement::find($id);
        $data->valide = $request->valide;
        // $data->status = "aproved";
        $data->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exigence = Requirement::find($id);
        $id_projet=$exigence->projet_id;
    	$exigence->delete();
        
    	$notification = array(
    		'message' => 'Software Requirement Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('Srequirements.view',$id_projet)->with($notification);
    }
}
