<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{

  public function profile()
  {
      $hour = date('H');
      $dayTerm = ($hour > 17) ? "Guten Abend" : (($hour > 12) ? "Guten Tag" : "Guten Morgen");
      $user = Auth()->user();
      return view('user.profile',compact('user','dayTerm'));
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
  $data = User::all();
  $collectionOfRoles = Role::pluck('name')->toArray();
  return view('users.index',compact('data','collectionOfRoles'))
  ->with('i');
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
  $roles = Role::pluck('name','name')->all();
  return view('users.create',compact('roles'));
  }
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
  $this->validate($request, [
  'name' => 'required',
  'roles' => 'required'
  ]);
  $input = $request->all();
  $input['password'] = Hash::make($input['password']);
  $user = User::create($input);
  $user->assignRole($request->input('roles'));
  return redirect()->route('users.index')
  ->with('success','User created successfully');
  }
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
  $user = User::find($id);
  return view('users.show',compact('user'));
  }
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
  $user = User::find($id);
  $roles = Role::pluck('name','name')->all();
  $userRole = $user->roles->pluck('name','name')->all();
  return view('users.edit',compact('user','roles','userRole'));
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
    $this->validate($request, [
    'roles' => 'required'
    ]);
    $input = $request->all();
    $user = User::find($id);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));

    $sucMsg = array(
      'message' => 'Erfolgreich bearbeitet',
      'alert-type' => 'success'
    );
    return redirect()->route('users.index')->with($sucMsg);
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)

  {
  User::find($id)->delete();

  $sucMsg = array(
    'message' => 'Erfolgreich bearbeitet',
    'alert-type' => 'success'
  );
  return redirect()->route('users.index')
  ->with($sucMsg);
  }
}