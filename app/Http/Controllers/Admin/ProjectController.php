<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use Illuminate\Validation\Rule;
use App\Models\Technology;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::with(['type', 'type.projects'])->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        //

        $types = Type::orderBy('name', 'asc')->get();
        $technologies = Technology::orderBy('name', 'asc')->get();

        return view('admin.projects.create', compact('types', 'project', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $form_data = $request->validated();
        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0;
        do {
            $find = Project::where('slug', $slug)->first();
            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        $new_project = Project::create($form_data);

        $new_project->save();

        //controllo se i dati sono stati inviati
        if($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }


        return to_route('admin.projects.show', $new_project);

      
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        $project->load(['type', 'type.projects']);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $project->load(['technologies']);


        $types = Type::orderBy('name', 'asc')->get();


        $technologies = Technology::orderBy('name', 'asc')->get();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        $form_data = $request->validated();
        $project->update($form_data);
        $project->save();
        // var_dump($request->technologies);

        if($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);

        } else { // utente non ha selezionato nessuna tecnologia

            $project->technologies()->detach();
        }
        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return to_route('admin.projects.index');
    }
}
