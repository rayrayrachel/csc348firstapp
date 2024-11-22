<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\BloggerProfile;
use Illuminate\Support\Facades\Log;


class BloggerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Request $request)
    {
        $user = $request->user();
        $bloggerProfile = $user->bloggerProfile; 
        return view('profile.update-blogger-profile-form', compact('bloggerProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $bloggerProfile = $user->bloggerProfile;

        return view('blogger.profile', [
            'bloggerProfile' => $bloggerProfile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request): RedirectResponse
     {
         $user = $request->user();
         $bloggerProfile = $user->bloggerProfile;

         $validated = $request->validate([
            'bio' => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        //Log::info($validated); 

        $bloggerProfile->update($validated);
        
        return Redirect::route('blogger.profile')->with('status', 'blogger-profile-updated');        
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
