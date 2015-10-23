<?php

namespace App\Http\Controllers;

use App\Group;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start'
        ]);

        if ($validator->fails()){
            return redirect(url('app'))
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $group = Group::find($request->get('group_id'));

            if ($group){
                $task = new Task($request->all());
                $task->save();
                return redirect(url('app'))->with('msg', 'Task created with success.');
            }
            else{
                return redirect(url('app'))->with('error', 'Error while creating Task.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if (isset($task) && $task){
            $task->delete();
            return json_encode(['msg' => 'Task deleted with success.']);
        }
        else{
            return json_encode(['error' => 'Error while deleting Task.']);
        }
    }
}
