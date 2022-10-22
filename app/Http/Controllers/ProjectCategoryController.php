<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = ProjectCategory::find($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:guarantee_categories,name"
        ], [
            "name.unique" => "Category already exists!"
        ]);

        ProjectCategory::create(["name" => $request->name]);

        return response()->json("Project category created successfully!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|unique:guarantee_categories,name,$id"
        ], [
            "name.unique" => "Category already exists!"
        ]);

        ProjectCategory::where("id", $id)->update(["name" => $request->name]);

        return response()->json("Project category updated successfully!");
    }

    public function destroy($id)
    {
        ProjectCategory::where("id", $id)->delete();
        return response()->json("Project category deleted successfully!");
    }
}
