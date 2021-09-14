<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\UseCase;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class UseCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $projet = Projet::find($id);
        $use = UseCase::where('projet_id' , $id)->get();
        $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
        // dd($resultat);
        return view('useCase.add_useCase',compact('resultat','projet','use'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
          $data = new UseCase();
          
          if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/use_case/'.$data->image));
    		$filename = $file->getClientOriginalName();
    		$file->move(public_path('upload/use_case'),$filename);
    		$data['image'] = $filename;
            $data->title=$request->title;
            $data->projet()->associate(Projet::Find($id));
        $data->save();
        $notification = array(
    		'message' => 'Use case Inserted Successfully',
    		'alert-type' => 'success'
    	);

        return redirect()->route('add.useCase',$id)->with($notification);
    	
    	   }
       
           else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 
        
   
    
   
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $useCase = UseCase::find($id);
        $id_projet=$useCase->projet_id;
    	$useCase->delete();
        
    	$notification = array(
    		'message' => 'Use  Case Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('add.useCase',$id_projet)->with($notification);
    }
}
