<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('user')->orderBy('created_at', 'desc')->get(); // Add ordering here
        return view('projects.index', ['projects' => $projects]);
    }

// app/Http/Controllers/ProjectController.php

public function userProjects(Request $request)
{
    $user = $request->user();
    $projects = $user->projects()->latest()->get();  // Make sure this query returns data
    $stats = ['total_projects' => $user->projects()->count()];
    return view('dashboard', compact('projects', 'stats'));  // Pass the projects variable
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
    public function show($id)
    {
        $project = Project::with('user')->findOrFail($id); 
        return view('projects.project', compact('project'));
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
