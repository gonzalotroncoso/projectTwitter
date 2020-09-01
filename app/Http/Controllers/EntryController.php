<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
		//laravel tiene un middleware para proteger que ningun usuario no registrado entre a las paginas que no re queremos
	}

    public function create (){
           	return view('entries.create');
    }
    public function store(Request $request){
    	$validateData = $request->validate([
    		'title'=>'required|min:7|max:255|unique:entries',
    		'content'=>'required|min:25|max:3000'
    	]);
    	$entry = new  Entry();
    	$entry->title = $validateData['title'];
    	$entry->content = $validateData['content'];
    	$entry->user_id = auth()->id();
    	$entry->save();//INSERT
    	$status = 'Your entry has been publish successfully';
    	return back()->with(compact('status'));
    
    //dd($request->all());
    //dd para imprimir todos los campos
    }
    public function edit(Entry $entry){
        $this->authorize($entry);
        return view('entries.edit',compact('entry'));
    }
    public function update(Request $request, Entry $entry){
        $this->authorize($entry);
        $validateData = $request->validate([
            'title'=>'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content'=>'required|min:25|max:3000'
        ]);
       
        $entry->title = $validateData['title'];
        $entry->content = $validateData['content'];
      
        $entry->save();//INSERT
        $status = 'Your entry has been updated successfully';
        return back()->with(compact('status'));
    
    }

}
