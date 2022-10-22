<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = ProjectCategory::with("projects")->get();
        return Inertia::render("Projects/index", ["projects" => $projects]);
    }

    public function show($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "contract_number" => "required|unique:projects,contract_number",
            "awarded_date" => "required|date",
            "amount" => "required|numeric",
            "client_name" => "required|max:255",
            "image" => "required",
            "completed" => "required|boolean",
            "issued_office" => "required",
            "category_id" => "required",
        ], [
            "contract_number.unique" => "Project contract already exists!"
        ]);

        Project::create($request->all());

        return response()->json("Project created successfully!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "contract_number" => "required|unique:projects,contract_number",
            "awarded_date" => "required|date",
            "amount" => "required|numeric",
            "client_name" => "required|max:255",
            "image" => "required",
            "completed" => "required|boolean",
            "issued_office" => "required",
            "category_id" => "required",
        ], [
            "contract_number.unique" => "Project contract already exists!"
        ]);

        Project::where("id", $id)->update($request->all());

        return response()->json("Project updated successfully!");
    }

    public function destroy($id)
    {
        Project::where("id", $id)->delete();
        return response()->json("Project deleted successfully!");
    }
}
