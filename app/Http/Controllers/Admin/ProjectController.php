<?php

namespace App\Http\Controllers\Admin;
use APP\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\EditProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        if($request->hasFile('image')){
            $img_path = Storage::put('project_images', $request->image);
            // dd($img_path);
            $form_data['image'] = $img_path;
        }
        $newPost = Project::create($form_data);
        // dd($form_data);
        // dd($newPost);
        return redirect()->route('admin.projects.show', $newPost->slug);
    }

    /** 
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project);
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        if ($project->title !== $form_data['title']) {
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $name = $request->image->getClientOriginalName();
            //dd($name);
            $path = Storage::putFileAs('project_images', $request->image, $name);
            $form_data['image'] = $path;
        }
        // DB::enableQueryLog();
        $project->update($form_data);
        // $query = DB::getQueryLog();
        // dd($query);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' è stato eliminato');
    }
}
