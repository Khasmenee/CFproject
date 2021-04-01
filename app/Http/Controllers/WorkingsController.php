<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Workings;

class WorkingsController extends Controller
{
    public function update(Request $request,$id){
        $input = $request->all();
        $work = Workings::findOrFail($id);
        $input['image']=$work->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['image']=$name;
        }
        $work->update($input);
        return redirect('/dashboard/store');
        
    }
}
