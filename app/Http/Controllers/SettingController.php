<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting;
        $setting->name = $request->input('name');
        $setting->value = $request->input('value');
        $setting->save();

        return redirect('/settings')->with('succes', 'Nieuwe setting werd toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::find($id);

        return view('settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);

        return view('settings.edit')->with('setting', $setting);
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
        $setting = Setting::find($id);
        $setting->name = $request->input('name');
        $setting->value = $request->input('value');
        $setting->save();

        return redirect('/settings')->with('succes', 'De setting werd aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();

        return redirect('/settings')->with('succes', 'De setting werd verwijderd');
    }

    public function settingsList()
    {   
        $settingsQuery = Setting::query();

        $settings = $settingsQuery->select('*');
        return datatables()->of($settings)
            ->addColumn('action', function (Setting $setting) {
                $button = '<a href="'.route('settings.show', ['setting' => $setting]).'" class="btn btn-primary btn-sm">Show</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="'.route('settings.edit', ['setting' => $setting]).'" class="btn btn-info btn-sm">Edit</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
