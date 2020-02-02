<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentBlock;

class WelcomeController extends Controller
{
    public function index() {
        $contentBlocks = ContentBlock::all();
        view()->share('contentBlocks', $contentBlocks);
        return view('welcome');
    }
}
