<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //show all
    public function index()
    {
        //
        return view('listings.index',[
            'heading' => 'Lasted List',
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'company' => 'required',
            'title' => ['required','min:5','max:50'],
            'location' => ['required'],
            'email' => ['email','required'],
            'website' => ['required','url'],
            'tags' => ['required','regex:/^[a-zA-Z]+(,[a-zA-Z]+)*$/'],
            'description' => ['required','min:20'],
        ]);
        if($request->hasFile('logo')){
            $validated['logo'] = $request->file('logo')->store('logos','public');
        }
        $validated['user_id'] = auth()->user()->id;
        Listing::create($validated);
        return redirect(route('listings.index'))->with('message','Posted Job');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show single element
    public function show(Listing $listing)
    {
        //
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
        if($listing->user_id != auth()->user()->id){
            abort(403,'Unauthorized action');
        }
        return view('listings.edit',[
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
        if($listing->user_id != auth()->user()->id){
            abort(403,'Unauthorized action');
        }
        $validated = $request->validate([
            'company' => 'required',
            'title' => ['required','min:5','max:50'],
            'location' => ['required'],
            'email' => ['email','required'],
            'website' => ['required','url'],
            'tags' => ['required','regex:/^[a-zA-Z]+(,[a-zA-Z]+)*$/'],
            'description' => ['required','min:20'],
        ]);
        if($request->hasFile('logo')){
            $validated['logo'] = $request->file('logo')->store('logos','public');
        }
        $listing->update($validated);
        return back()->with('message','Listing update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
        if($listing->user_id != auth()->user()->id){
            abort(403,'Unauthorized action');
        }
        $listing->delete();
        return redirect(route('listings.index'))->with('message','Listing delete successfuly');
    }
    public function manage(Request $request)
    {
        return view('listings.manage',[
            'listings' => $request->user()->listings()->get()
        ]);
    }
}
