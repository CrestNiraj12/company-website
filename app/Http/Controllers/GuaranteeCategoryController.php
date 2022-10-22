<?php

namespace App\Http\Controllers;

use App\Models\GuaranteeCategory;
use Illuminate\Http\Request;

class GuaranteeCategoryController extends Controller
{
    public function index()
    {
        $categories = GuaranteeCategory::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = GuaranteeCategory::find($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:guarantee_categories,name"
        ], [
            "name.unique" => "Category already exists!"
        ]);

        GuaranteeCategory::create(["name" => $request->name]);

        return response()->json("Guarantee category created successfully!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|unique:guarantee_categories,name,$id"
        ], [
            "name.unique" => "Category already exists!"
        ]);

        GuaranteeCategory::where("id", $id)->update(["name" => $request->name]);

        return response()->json("Guarantee category updated successfully!");
    }

    public function destroy($id)
    {
        GuaranteeCategory::where("id", $id)->delete();
        return response()->json("Guarantee category deleted successfully!");
    }
}
