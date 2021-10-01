<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userID = auth()->user()->id;
        $files = File::where("userId", '=', $userID)->get();
        return view("files.index")->with('files', $files);
    }


    public function create()
    {
        return view("files.create");
    }


    public function store(Request $request)
    {

        $request->validate([
            "Title"=> "required",
            "Description"=> "required",
            "inputFile"=> "required|mimes:png,jpg"
        ]);
        
        
        $file = new File();
        $file->title =$request->Title;
        $file->description =$request->Description;
        $file->userId = $request->userID;

        $file_data = $request->file('inputFile');
        $fileName = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/uploads/' , $fileName);

        $file->mainFile = $fileName;
        $file->save();
        return redirect('file/create')->with("added", "Added Successfuly");

    }


    public function show($id)
    {
        $file = File::find($id);
        return view('files.show')->with("file", $file);
    }


    public function edit($id)
    {
        $file = File::find($id);
        return view('files.edit')->with("file", $file);
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            "Title"=> "required",
            "Description"=> "required",
            "inputFile"=> "required|mimes:png,jpg"
        ]);

        $file = File::find($id);
        $file->title =$request->Title;
        $file->description =$request->Description;

        $file_data = $request->file('inputFile');
        $fileName = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/uploads/' , $fileName);

        $file->mainFile = $fileName;
        $file->save();
        return redirect('file/')->with("edited", "Edited Successfuly");
    }


    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect('file/')->with("deleted", "Deleted Successfuly");

    }

    public function download($id)
    {
        $file = File::where('id', $id)->firstOrFail();
        $path = public_path('uploads/' . $file->mainFile);
        return response()->download($path);
    }
}
