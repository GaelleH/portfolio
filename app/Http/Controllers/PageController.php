<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validated();

        //Create setting
        $page = new Page;
        $page->slug = $request->input('slug');
        $page->text = $request->input('text');
        $page->title = $request->input('title');
        $page->save();

        return redirect('/pages')->with('succes', 'Nieuwe pagina werd toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        return view('pages.show')->with('page', $page);
    }

    public function showPage($id) {
        $page = Page::find($id);
        $privacyPolicy = Page::where('slug', '=', 'privacy-beleid')->first();

        view()->share('privacyPolicy', $privacyPolicy);

        return view('pages.showpages')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('pages.edit')->with('page', $page);
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
        $page = Page::find($id);
        $page->slug = $request->input('slug');
        $page->text = $request->input('text');
        $page->title = $request->input('title');
        $page->save();

        return redirect('/pages')->with('succes', 'De pagina werd aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect('/pages')->with('succes', 'De pagina werd verwijderd');
    }

    public function pagesList()
    {   
        $pagesQuery = Page::query();

        $pages = $pagesQuery->select('*');
        return datatables()->of($pages)
            ->addColumn('action', function (Page $page) {
                $button = '<a href="'.route('pages.show', ['page' => $page]).'" class="btn btn-primary btn-sm">Show</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="'.route('pages.edit', ['page' => $page]).'" class="btn btn-info btn-sm">Edit</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
