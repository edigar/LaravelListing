<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($moduleId)
    {
        $activities = Activity::where('module_id', $moduleId)->get();
        $activities = !isset($activities[0]->id) ? array(array('module_id' => $moduleId)) : $activities;

        return view('activities.index',compact('activities', $activities));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($moduleId)
    {
        return View::make('activities.create')->with('moduleId', $moduleId);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = new Activity();
        $data = $this->validate($request, [
            'title' => 'required',
            'module_id' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
       
        $activity->saveActivity($data);
        return redirect('/activities/' . $data['module_id'])->with('message', 'Nova Atividade criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::where('id', $id)->first();

        return view('activities.edit', compact('activity', 'id'));
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
        $activity = new Activity();
        $data = $this->validate($request, [
            'title'=> 'required',
            'module_id' => 'required',
            'description'=>'required',
            'status'=> 'required'
        ]);
        $data['id'] = $id;
        $activity->updateActivity($data);

        return redirect('/activities/' . $data['module_id'])->with('message', 'Atividade atualizada!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $moduleId = $activity->module_id;
        $activity->delete();

        return redirect('/activities/' . $activity['module_id'])->with('message', 'Atividade deletada!!');
    }
}
