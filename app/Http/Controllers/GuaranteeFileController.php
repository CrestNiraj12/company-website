<?php

namespace App\Http\Controllers;

use App\Models\GuaranteeFile;
use Illuminate\Http\Request;

class GuaranteeFileController extends Controller
{
    public function index()
    {
        $files = GuaranteeFile::all();
        return response()->json($files);
    }

    public function show($id)
    {
        $guarantee = GuaranteeFile::find($id);
        return response()->json($guarantee);
    }

    public function store(Request $request)
    {
        $request->validate([
            "issued_date" => "required|date",
            "end_date" => "required|date",
            "path" => "required",
            "guarantee_id"  => "required"
        ]);

        GuaranteeFile::create($request->all());

        return response()->json("File created successfully!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "issued_date" => "required|date",
            "end_date" => "required|date",
            "path" => "required",
            "guarantee_id"  => "required"
        ]);

        GuaranteeFile::where("id", $id)->update($request->all());

        return response()->json("File updated successfully!");
    }

    public function destroy($id)
    {
        GuaranteeFile::where("id", $id)->delete();
        return response()->json("File deleted successfully!");
    }
}
