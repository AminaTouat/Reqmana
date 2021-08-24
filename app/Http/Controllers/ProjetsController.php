<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjetsController extends Controller
{
    public function index() {
        
        $projets = Projet::get();
        return view('dashboard.index' , compact('projets'));
    
    }
    public function nouveauProjet(){
        $projets = Projet::get();
        return view('projects.add_project' , compact('projets'));
    }
    public function createProjet(Request $request){
        $projet = new Projet();
        $projet->title = $request['title'];
        $projet->save();
        $projet->users()->attach(Auth::user());

        $notification = array(
            'message' => 'Projet created successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    public function currentProject($id){
        $projet = Projet::find($id);
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('projects.index', compact('resultat','projet'));
    }
}
