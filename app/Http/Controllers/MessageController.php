<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use DB;
use App\Models\Projet;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
            $allData = User::all();
            $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$id)->get();
           $projet = Projet::find($id);
           $resultat= Auth::user()->projets()->where('projet_id',$id)->select('user_projet.role')->first();
           return view('backend.user.message_user',$data,compact('resultat','projet'));
   
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$projet_id)
    {
        
        $user_message = User::Find($id);
        $allData = User::all();
            $data['allData'] = User::join('user_projet','user_id','users.id')->where('user_projet.projet_id',$projet_id)->get();
           $projet = Projet::find($projet_id);
           $resultat= Auth::user()->projets()->where('projet_id',$projet_id)->select('user_projet.role')->first();
           //dd($user);
           return view('backend.user.send_message',$data,compact('user_message','resultat','projet'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Message::create($input);
   
        return back();
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
        //
    }
}
