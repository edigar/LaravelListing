<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Activity;

class ModuleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();

        foreach($modules as $key => $module) {
            $modules[$key]['countActivities'] = Activity::where('module_id', $module->id)->count();
        }

        return view('modules.index',compact('modules',$modules));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = new Module();
        $data = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
       
        $module->saveModule($data);
        return redirect('/modules')->with('message', 'Novo Módulo criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::where('id', $id)->first();

        return view('modules.edit', compact('module', 'id'));
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
        $module = new Module();
        $data = $this->validate($request, [
            'title'=> 'required',
            'description'=>'required',
            'status'=> 'required'
        ]);
        $data['id'] = $id;
        $module->updateModule($data);

        return redirect('/modules')->with('message', 'Módulo atualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();

        return redirect('/modules')->with('message', 'Module deletado!!');
    }
}
