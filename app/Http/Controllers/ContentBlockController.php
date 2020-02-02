<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentBlockStore;
use App\ContentBlock;

class ContentBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contentBlocks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contentBlocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentBlockStore $request)
    {
        $validated = $request->validated();

        //Create setting
        $contentBlock = new ContentBlock;
        $contentBlock->description = $request->input('description');
        $contentBlock->internal_name = $request->input('internal_name');
        $contentBlock->title = $request->input('title');
        $contentBlock->save();

        return redirect('/content-blocks')->with('succes', 'Nieuwe content block toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contentBlock = ContentBlock::find($id);

        return view('contentBlocks.show')->with('contentBlock', $contentBlock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contentBlock = ContentBlock::find($id);

        return view('contentBlocks.edit')->with('contentBlock', $contentBlock);
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
        $this->validate($request, [
            'description' => 'required',
            'internal_name' => 'required',
            'title' => 'required',
        ]);

        $contentBlock = ContentBlock::find($id);
        $contentBlock->description = $request->input('description');
        $contentBlock->internal_name = $request->input('internal_name');
        $contentBlock->title = $request->input('title');
        $contentBlock->save();

        return redirect('/content-blocks')->with('succes', 'De content block werd aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contentBlock = ContentBlock::find($id);
        $contentBlock->delete();

        return redirect('/content-blocks')->with('succes', 'De content block werd verwijderd');
    }

    public function contentBlocksList()
    {   
        $contentBlocksQuery = ContentBlock::query();

        // $start_date = (!empty($_GET["start_date"])) ? $_GET["start_date"] : '';
        // $end_date = (!empty($_GET["end_date"])) ? $_GET["end_date"] : '';
 
        // if($start_date && $end_date){
        //     $start_date = date('Y-m-d', strtotime($start_date));
        //     $end_date = date('Y-m-d', strtotime($end_date));

        //     $clientsQuery->whereRaw("date(clients.created_at) >= '" . $start_date . "' AND date(clients.created_at) <= '" . $end_date . "'");
        // }
        $contentBlocks = $contentBlocksQuery->select('*');
        return datatables()->of($contentBlocks)
            ->addColumn('action', function (ContentBlock $contentBlock) {
                $button = '<a href="'.route('content-blocks.show', ['contentBlock' => $contentBlock]).'" class="btn btn-primary btn-sm">Show</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="'.route('content-blocks.edit', ['contentBlock' => $contentBlock]).'" class="btn btn-info btn-sm">Edit</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
