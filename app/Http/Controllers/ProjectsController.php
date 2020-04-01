<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Page;
use App\Project;
use App\ProjectImage;
use App\Setting;

class ProjectsController extends Controller
{
    public function allProjects()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $privacyPolicy = Page::where('slug', '=', 'privacy-beleid')->first();
        $settings = Setting::all();

        $existingSettings = [];
        foreach($settings as $setting) {
            $existingSettings[$setting->name] = $setting->value;
        }

        view()->share('privacyPolicy', $privacyPolicy);
        view()->share('settings', $existingSettings);

        return view('projects.allprojects')->with('projects', $projects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'mimes:png,jpg,jpeg'
        ]);

        $project = new Project;
        $project->description = $request->input('description');
        $project->title = $request->input('title');
        $project->save();

        if ($request->hasFile('filename'))
        {
            foreach ($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);
                $data[] = $name; 
                
                $projectImage = new ProjectImage;
                $projectImage->project_id = $project->id;
                $projectImage->project_image_path = $name;
                $projectImage->save();
            }
        }

        return redirect('/projects')->with('succes', 'Nieuw project toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('project_images')->find($id);

        return view('projects.show')->with('project', $project);
    }

    public function showProject($id) {
        $project = Project::with('project_images')->find($id);
        $privacyPolicy = Page::where('slug', '=', 'privacy-beleid')->first();
        $settings = Setting::all();

        $existingSettings = [];
        foreach($settings as $setting) {
            $existingSettings[$setting->name] = $setting->value;
        }

        view()->share('privacyPolicy', $privacyPolicy);
        view()->share('settings', $existingSettings);

        return view('projects.showprojects')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with('project_images')->find($id);

        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'filename' => 'required',
        //     'filename.*' => 'mimes:png,jpg,jpeg'
        // ]);

        $project = Project::find($id);
        $project->description = $request->input('description');
        $project->title = $request->input('title');
        $project->save();

        $projectImages = ProjectImage::all()->where('project_id', '=', $id);

        $existingImages = [];
        foreach($projectImages as $image) {
            $existingImages[$image->id] = $image;
        }
        
        if ($request->input('remove_image')) {
            foreach($request->input('remove_image') as $key => $removeImage) {
                if(isset($existingImages[$key])) {
                    $existingImages[$key]->delete();
                }
            }
        }

        if ($request->hasFile('filename'))
        {
            foreach ($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);
                $data[] = $name; 
                
                $projectImage = new ProjectImage;
                $projectImage->project_id = $project->id;
                $projectImage->project_image_path = $name;
                $projectImage->save();
            }
        }

        return redirect('/projects')->with('succes', 'Het project werd bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::with('project_images')->find($id);

        foreach($project->project_images as $projectImage) {
            if($projectImage->project_image_path != 'noimage.jpg'){
                //delete image
                $projectImage->delete();
            }
        }

        $project->delete();
        return redirect('/projects')->with('succes', 'Het project werd succesvol verwijderd.');
    }

    public function projectsList()
    {   
        $projectsQuery = Project::query();

        $projects = $projectsQuery->select('*');
        return datatables()->of($projects)
            ->addColumn('action', function (Project $project) {
                $button = '<a href="'.route('projects.show', ['project' => $project]).'" class="btn btn-primary btn-sm">Show</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="'.route('projects.edit', ['project' => $project]).'" class="btn btn-info btn-sm">Edit</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
