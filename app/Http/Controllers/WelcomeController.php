<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ContentBlock;
use App\Project;

class WelcomeController extends Controller
{
    public function index() {
        $contentBlocks = ContentBlock::all();
        $projects = Project::with('project_images')->orderBy('id', 'desc')->take(6)->get();

        view()->share('contentBlocks', $contentBlocks);
        view()->share('projects', $projects);
        return view('welcome');
    }
}
