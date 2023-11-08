<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::select("id", "title", "author", "date", "link", "type_id", "description", "cover_image")
            ->with('type:id,label', 'technologies:id,tech_name')
            ->paginate(10);

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::select("id", "title", "author", "date", "link", "type_id", "description", "cover_image")
            ->where('id', $id)
            ->with('type:id,label', 'technologies:id,tech_name')
            ->first();

        return response()->json($project);
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
        //
    }

    public function projectsByType($type_id)
    {
        $projects = Project::select("id", "title", "author", "date", "link", "type_id", "description", "cover_image")
            ->where("type_id", $type_id)
            ->with('type:id,label', 'technologies:id,tech_name')
            ->orderByDesc('id')
            ->paginate(10);

        return response()->json($projects);
    }
}
