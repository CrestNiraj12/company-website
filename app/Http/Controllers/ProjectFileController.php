<?php

namespace App\Http\Controllers;

use App\Models\ProjectFile;
use Illuminate\Http\Request;

class ProjectFileController extends Controller
{
    public function index()
    {
        $files = ProjectFile::all();
        return response()->json($files);
    }

    public function show($id)
    {
        $file = ProjectFile::find($id);
        return response()->json($file);
    }

    public function store(Request $request)
    {
        $request->validate([
            "path" => "required",
            "project_id"  => "required"
        ]);

        ProjectFile::create($request->all());

        return response()->json("File created successfully!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "path" => "required",
            "project_id"  => "required"
        ]);

        ProjectFile::where("id", $id)->update($request->all());

        return response()->json("File updated successfully!");
    }

    public function destroy($id)
    {
        ProjectFile::where("id", $id)->delete();
        return response()->json("File deleted successfully!");
    }
}
