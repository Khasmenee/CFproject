<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests\NewCategoryRequest;
use App\Caticon;

class CategoriesController extends Controller
{
    public function home(){
        $categories = Category::paginate(5);
        return view('category.home',['categories'=>$categories]);
    }
    public function show($id){
        $category = Category::findOrFail($id);
        return view('category.show',['category' =>$category]);
    }
    public function new(){
        return view('category.new');
    }
    public function store(Request $request){
        $input['caticon_id']=0;
        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $icon = Caticon::create(['name' => $name]);
            $input['caticon_id']=$icon->id;
        }
        $input['name']=$request->name;
        $input['detail']=$request->detail;
        $input['status']=$request->status;
        $input['type']=$request->type;
        Category::create($input);
        return redirect('/dashboard/categories');
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit',['category' =>$category]);
    }
    public function update(Request $request,$id){
        $input=$request->all();
        $category = Category::findOrFail($id);
        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $icon = Caticon::create(['name' => $name]);
            $input['caticon_id']=$icon->id;
        }
        $category->update($input);
        return redirect('/dashboard/categories');
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        $icon = Caticon::findOrFail($id);
        $category->delete();
        $icon->delete();
        return redirect('/dashboard/categories');
    }

    public function __construct(){
        $this->middleware('auth');
    }

}

