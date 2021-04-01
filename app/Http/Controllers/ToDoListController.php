<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;

class ToDoListController extends Controller
{
    public function store(Request $request){
        $input['list']=$request->list;
        ToDoList::create($input);
        return redirect('/dashboard/manage');
    }
    public function delete($id){
        $list = ToDoList::findOrFail($id);
        $list->delete();
        return redirect('/dashboard/manage');
    }
}
