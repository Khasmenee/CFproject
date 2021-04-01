<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\NewUserRequest;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user.home',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUserRequest $request)
    {
        $input = $request->all();
        $input['password']=bcrypt($request->password);
        User::create($input);
        Session::flash('success_msg','ได้ทำการเพิ่มข้อมูลผู้ใช้ใหม่เรียบร้อยแล้วค่ะ');
        return redirect('/dashboard/users');
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
        $user = User::findOrFail($id);
        return view('user.edit',['user'=> $user]);
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
        $user = User::findOrFail($id);
        $input['password']=$user->password;
        $input['email']=$user->email;
        $input['name']=$request->name;
        $input['gender']=$request->gender;
        $input['dateofbirth']=$request->dateofbirth;
        $input['address']=$request->address;
        $input['telophone']=$request->telophone;
        $input['type']=$request->type;
        $input['academy']=$request->academy;
        $input['lineid']=$request->lineid;
        $input['role']=$request->role;
        $input['status']=$request->status;
        $user->update($input);
        Session::flash('success_msg','ได้ทำการแก้ไขข้อมูลผู้ใช้เรียบร้อยแล้วค่ะ');
        return redirect('/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Session::flash('success_msg','ได้ทำการลบข้อมูลผู้ใช้เรียบร้อยแล้วค่ะ');
        return redirect('/dashboard/users');
    }
    public function __construct(){
        $this->middleware('auth');
    }
}
