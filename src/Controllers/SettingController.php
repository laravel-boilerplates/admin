<?php

namespace LaravelBoilerplates\Admin\Controllers;

use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LaravelAdmin\Requests\SettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $key = Str::slug($request->input('key'), '-');

      if($request->hasFile('file')) {
        $data['key'] = $key;
        $data['type'] = 'file';
        $file = $request->file('file');
        $file->store('public');
        $data['filename'] = $file->hashName();

      }
      elseif($request->input('type') == 'multi') {
        $data['key'] = $key;
        $data['type'] = 'multi';
        $data['values'] = array_combine( $request->input('subkeys'), $request->input('values') );

      } else {
        $data['key'] = $key;
        $data['type'] = 'single';
        $data['value'] = $request->input('value');
      }

      setting()->put($key, $data);

      flash('The setting \'' . $key . '\' has been created.')->success();

      return redirect()->route('admin.settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $key
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
      $setting = setting()->get($key);

      return view('admin.settings.show')->with(compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $key
     * @return \Illuminate\Http\Response
     */
    public function edit($key)
    {
      $setting = setting()->get($key);

      return view('admin.settings.edit')->with(compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LaravelAdmin\Requests\SettingRequest  $request
     * @param  string  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {

      if($request->hasFile('file')) {
        $data['key'] = $key;
        $data['type'] = 'file';
        $file = $request->file('file');
        $file->store('public');
        $data['filename'] = $file->hashName();

      }
      elseif($request->input('type') == 'multi') {
        $data['key'] = $key;
        $data['type'] = 'multi';
        $data['values'] = array_combine( $request->input('subkeys'), $request->input('values') );

      } else {
        $data['key'] = $key;
        $data['type'] = 'single';
        $data['value'] = $request->input('value');
      }

      setting()->put($key, $data);

      flash('The setting has been updated.')->success();

      return redirect()->route('admin.settings.show', $key);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      $name = $client->name;
      $client->delete();

      flash($name . ' has been deleted.')->success();

      return redirect()->route('clients.index');
    }
}
