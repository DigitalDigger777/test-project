<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Save project.
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        $project = new Project();
        $project->client_id = request()->get('client_id');
        $project->name = request()->get('name');
        $project->description = request()->get('description');
        $project->statuses = request()->get('statuses');

        $project->save();

        return response()->json($project);
    }

    /**
     * Update project.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id)
    {
        $project = Project::find($id);

        if ($project) {
            $clientId = request()->get('client_id');
            $name = request()->get('name');
            $description = request()->get('description');
            $statuses = request()->get('statuses');

            if ($clientId) {
                $project->client_id = $clientId;
            }

            if ($name) {
                $project->name = $name;
            }

            if ($description) {
                $project->description = $description;
            }

            if ($statuses) {
                $project->statuses = $statuses;
            }

            $project->save();

            return response()->json($project);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'project not found'
                ]
            ], 404);
        }


    }

    /**
     * Get projects.
     * @return \Illuminate\Http\JsonResponse
     */
    public function items()
    {
        $projects = Project::all();

        return response()->json($projects);
    }

    /**
     * Get project.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function item($id)
    {
        $project = Project::find($id);

        if ($project) {
            return response()->json($project);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'project not found'
                ]
            ], 404);
        }
    }

    /**
     * Remove project.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->delete();
            return response()->json([
                'message' => 'project remove successful'
            ]);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'project not found'
                ]
            ], 404);
        }
    }
}
