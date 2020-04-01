<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ContentBlock;
use App\Page;
use App\Project;
use App\Setting;

class WelcomeController extends Controller
{
    public function index() {
        $contentBlocks = ContentBlock::all();
        $projects = Project::with('project_images')->orderBy('id', 'desc')->take(6)->get();
        $privacyPolicy = Page::where('slug', '=', 'privacy-beleid')->first();
        $settings = Setting::all();

        $existingSettings = [];
        foreach($settings as $setting) {
            $existingSettings[$setting->name] = $setting->value;
        }

        view()->share('contentBlocks', $contentBlocks);
        view()->share('privacyPolicy', $privacyPolicy);
        view()->share('projects', $projects);
        view()->share('settings', $existingSettings);
        return view('welcome');
    }
}
