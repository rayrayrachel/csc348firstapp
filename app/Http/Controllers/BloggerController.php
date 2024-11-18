<?php

namespace App\Http\Controllers;
use App\Models\BloggerProfile;
use Illuminate\Http\Request;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloggers = BloggerProfile::all();
        return view('bloggers',['bloggers'=>$bloggers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($profileID = null)
    {

        if ($profileID) {
            $profile = BloggerProfile::findOrFail($profileID);       
                if (!$profile) {
                    return redirect()->route('bloggers')->with('error', 'Blogger not found');
                }
                return view('profile', compact('profile'));
            }
        return redirect()->route('bloggers');
            
        
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
