<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Chef::latest()->paginate(20);
        return view('admin.chef.index' , ['chefs' => $chefs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:20',
            'lastname' => 'required|max:30',
            'role' => 'required|max:20',
            'image' => 'required|image',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required'
        ]);

        $data['image'] = request()->file('image')->store('/images');

        Chef::create($data);

        return redirect()->route('admin-chefs')->with('success' , 'Added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef $chef)
    {
        return view('admin.chef.edit' , ['chef' => $chef]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef $chef)
    {
        $data = $request->validate([
            'name' => 'max:20',
            'lastname' => 'max:30',
            'role' => 'max:20',
            'image' => 'image',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => ''
        ]);

        if($request->file('image')){
            $data['image'] = request()->file('image')->store('/images');
        }

        $chef->update($data);

        return redirect()->route('admin-chefs')->with('success' , 'Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('admin-chefs')->with('success' , 'Deleted Succesfully');
    }
}
