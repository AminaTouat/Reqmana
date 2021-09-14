<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Requirement;
use Auth;
use App\Models\Link;

class LinksController extends Controller
{
    public function index($id,$id_exigence)
    {
        $projet = Projet::find($id);
        $exigences = Link::where('parent_id' , $id_exigence)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.requirements.nonfon' , compact('resultat','exigences','projet'));
    }
    public function software($id,$id_software)
    {
        $projet = Projet::find($id);
        $exigence = Requirement::find($id_software)->first();
        //dd($exigences);
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('backend.requirements.software' , compact('resultat','exigence','projet'));
    }
    //
    public function store(Request $request)
    {
        $id=$request->exigence_id;
        // for ( $i = 1; $i < $id; $i++ ){
        foreach($id as $id) {   
        $data = new Link();
        $data->exigence_id = $id;
        $data->parent_id = $request->parent_id[0];
        $data->save();
        }
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $id=$request->sup;
        dd($id);
        foreach($id as $id) {  
            $nonfon = Link::find($id);
            $nonfon->delete();

        }
        
        // $id_projet=$useCase->projet_id;
    	
        
    	// $notification = array(
    	// 	'message' => 'Use  Case Deleted Successfully',
    	// 	'alert-type' => 'info'
    	// );

    	return redirect()->back();
    }
}
