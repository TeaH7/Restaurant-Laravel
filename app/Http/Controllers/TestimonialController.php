<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonial.index' , [ 'testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'lastname' => 'required|max:20',
            'testimonial' => 'required|max:100',
            'role' => 'required|max:20',
            'image' => 'required|image'
        ]);

        $data['image'] = request()->file('image')->store('/images');

        Testimonial::create($data);


        return redirect()->route('admin-testimonials')->with('success' , 'Added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit' , [ 'testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'max:20',
            'lastname' => 'max:20',
            'testimonial' => 'max:100',
            'role' => 'max:20',
            'image' => 'image'
        ]);

        if($request->file('image')){
            $data['image'] = request()->file('image')->store('/images');
        }

        $testimonial->update($data);


        return redirect()->route('admin-testimonials')->with('success' , 'Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin-testimonials')->with('success' , 'Deleted succesfully');
    }
}
