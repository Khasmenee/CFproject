<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TopicHomepage;

class TopicController extends Controller
{
    public function update(Request $request,$id){
        $topic = TopicHomepage::findOrFail($id);
        $topic->update($request->all());
        return redirect('/dashboard/store');
    }
}
