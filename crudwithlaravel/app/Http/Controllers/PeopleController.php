<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::all();
        return view('index', compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|max:10000|mimes:doc,docx,pdf',

        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $fileName = time() . '.' . request()->file->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        request()->file->move(public_path('files'), $fileName);
        $people = new People();
        $people->name = $request->name;
        $people->email = $request->email;
        $people->address = $request->address;
        $people->image = $imageName;
        $people->file = $fileName;

        $people->save();
        return view('create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peoples = People::find($id);
        return view('edit', compact('peoples'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|max:100000|mimes:doc,docx,pdf',

        ]);

        $peoples = People::find($request->id);
        $peoples->Name = $request->name;
        $peoples->Email = $request->email;
        $peoples->Address = $request->address;
        if ($request->hasFile('image')) {
            if ($peoples->image) {
                File::delete(public_path($peoples->image));
            }
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/'), $imageName);
            $peoples->image = $imageName;
        }
        if ($request->hasFile('file')) {
            if ($peoples->File) {
                File::delete(public_path($peoples->File));
            }
            $fileName = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('files/'), $fileName);
            $peoples->File = $fileName;
        }
        //dd($peoples->update());

        $peoples->update();
        $peoples->save();
        //return view('create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = People::where('id', $id)->delete();
        return redirect()->route('index');
    }
}
