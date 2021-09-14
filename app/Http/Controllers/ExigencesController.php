<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exigence;
use App\Models\Projet;
use App\Models\Requirement;
use App\Models\User;
use Auth;
use App\Models\Link;

class ExigencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $projet = Projet::find($id);
        $exigences = Exigence::where('projet_id' , $id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.requirements.requirements_view' , compact('resultat','exigences','projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createe($id,$id_use)
    {
        
        $projet = Projet::find($id);
        $id_use= $id_use;
        $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.requirements.requirements_add' ,$data,compact('resultat','projet','id_use'));
    }
    public function create($id)
    {
        $projet = Projet::find($id);
       
        $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.requirements.requirements_add' ,$data,compact('resultat','projet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      
        $data = new Exigence();
        $data->requirementType = $request->requirementType;
        $data->importance = $request->importance;
        $data->entredBy = $request->entredBy;
        $data->source = $request->source;
        $data->summary = $request->summary;
        $data->body = $request->body;
        $data->use_case_id = $request->id_use;
        if($data->requirementType!= null && $data->importance!=null && $data->entredBy!=null && $data->source!=null && $data->summary!=null && $data->body!=null){
            $data->status = "Implemented";
        }
        else  $data->status = "Draft";
        $data->projet_id = $request->projet_id;
       
    	$data->save();
        
        $id=$request->projet_id;
        $notification = array(
            'message' => 'User requirement created successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('requirements.view',$id)->with($notification);
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

        $editData = Exigence::find($id);
        $links = Link::where('parent_id' , $id)->get();;
        $projet_id = $editData->projet_id;
        $projet = Projet::find($projet_id);
        $exigences = Exigence::where('projet_id' , $projet_id)->where('requirementType' , 'nonfunctional')->get();
        $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$projet_id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$projet_id)->select('user_projet.role')->first();
        return view('backend.requirements.requirements_edit',$data,compact( 'exigences','resultat','editData','projet','links'));
        //
    }
    public function detail($id)
    {
        $req=Requirement::where('exigence_id' , $id)->get();
        $editData = Exigence::find($id);
        $id = $editData->projet_id;
        $projet = Projet::find($id);
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.requirements.requirements_detail',compact('resultat','editData','projet','req'));
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
        $data = Exigence::find($id);
        $data->requirementType = $request->requirementType;
        $data->importance = $request->importance;
        $data->entredBy = $request->entredBy;
        $data->source = $request->source;
        $data->summary = $request->summary;
        $data->body = $request->body;
        if($data->requirementType!= null && $data->importance!=null && $data->entredBy!=null && $data->source!=null && $data->summary!=null && $data->body!=null){
            $data->status = "Implemented";
        }
        else  $data->status = "Draft";
        
    	$data->save();
        $id=$request->projet_id;
    	$notification = array(
    		'message' => 'User requirement Updated Successfully',
    		'alert-type' => 'info'
    	);
    
    	return redirect()->route('requirements.view',$id)->with($notification);
    }
    public function valide(Request $request, $id){
        $data = Exigence::find($id);
        $data->valide = $request->valide;
        if($request->valide=='1'){
        $data->status = "Approved";
        }
        if($request->valide=='0'){
        $data->status = "Draft";
        }
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
        $exigence = Exigence::find($id);
        $id_projet=$exigence->projet_id;
    	$exigence->delete();
        
    	$notification = array(
    		'message' => 'User Requirement Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('requirements.view',$id_projet)->with($notification);
    }
}
