<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Exigence;
use App\Models\Requirement;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class ProjetsController extends Controller
{
    public function index() {
    //     $viewer = Auth::user()->projets()->exigences()->select(DB::raw("SUM(status) as count"))
    //     // ->orderBy("created_at")
    //     // ->groupBy(DB::raw("year(created_at)"))
    //     ->get()->toArray();
    // $viewer = array_column($viewer, 'count');
    // dd($viewer);
    
    // $click = User::select(DB::raw("SUM(name) as count"))
    //     // ->orderBy("created_at")
    //     ->groupBy(DB::raw("year(created_at)"))
    //     ->get()->toArray();
    // $click = array_column($click, 'count');
        $projets = Auth::user()->projets()->where('user_projet.inv','1')->get();
        return view('dashboard.index' , compact('projets'));
        // ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
        // ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
    
    }
    public function nouveauProjet(){
        $projets = Auth::user()->projets()->where('user_projet.inv','1')->get();
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
        $draft = Exigence::where('projet_id' , $id)->where('status','Draft')->count("id");
        $implemented = Exigence::where('projet_id' , $id)->where('status','implemented')->count("id");
        $approved = Exigence::where('projet_id' , $id)->where('status','Approved')->count("id");
        $must = Exigence::where('projet_id' , $id)->where('importance','must')->count("id");
        $should = Exigence::where('projet_id' , $id)->where('importance','should')->count("id");
        $may = Exigence::where('projet_id' , $id)->where('importance','may')->count("id");
     
        $Sdraft = Requirement::where('projet_id' , $id)->where('status','Draft')->count("id");
        $Simplemented = Requirement::where('projet_id' , $id)->where('status','implemented')->count("id");
        $Sapproved = Requirement::where('projet_id' , $id)->where('status','Approved')->count("id");
        $Smust = Requirement::where('projet_id' , $id)->where('importance','must')->count("id");
        $Sshould = Requirement::where('projet_id' , $id)->where('importance','should')->count("id");
        $Smay = Requirement::where('projet_id' , $id)->where('importance','may')->count("id");
     
        // dd($approved);
        $projet = Projet::find($id);
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        return view('projects.index', compact('resultat','projet'))
        ->with('draft',json_encode($draft,JSON_NUMERIC_CHECK))
        ->with('implemented',json_encode($implemented,JSON_NUMERIC_CHECK))
        ->with('approved',json_encode($approved,JSON_NUMERIC_CHECK))
        ->with('Sdraft',json_encode($Sdraft,JSON_NUMERIC_CHECK))
        ->with('Simplemented',json_encode($Simplemented,JSON_NUMERIC_CHECK))
        ->with('Sapproved',json_encode($Sapproved,JSON_NUMERIC_CHECK))
        ->with('must',json_encode($must,JSON_NUMERIC_CHECK))
        ->with('should',json_encode($should,JSON_NUMERIC_CHECK))
        ->with('may',json_encode($may,JSON_NUMERIC_CHECK))
        ->with('Smust',json_encode($Smust,JSON_NUMERIC_CHECK))
        ->with('Sshould',json_encode($Sshould,JSON_NUMERIC_CHECK))
        ->with('Smay',json_encode($Smay,JSON_NUMERIC_CHECK));
    }
}
