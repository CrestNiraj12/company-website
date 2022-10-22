<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuaranteeController extends Controller
{
    public function index()
    {
        $guarantees = Guarantee::all();
        return Inertia::render("Guarantees/index", ["guarantees" => $guarantees]);
    }

    public function show($id)
    {
        $guarantee = Guarantee::find($id);
        return response()->json($guarantee);
    }

    public function store(Request $request)
    {
        $request->validate([
            "guarantee_number" => "required|unique:guarantees,guarantee_number",
            "issued_office" => "required",
            "category_id" => "required",
        ], [
            "guarantee_number.unique" => "Guarantee already exists!"
        ]);

        Guarantee::create($request->all());

        return response()->json("Guarantee created successfully!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "guarantee_number" => "required|unique:guarantees,guarantee_number,$id",
            "issued_office" => "required",
            "category_id" => "required",
        ], [
            "guarantee_number.unique" => "Guarantee already exists!"
        ]);

        Guarantee::where("id", $id)->update($request->all());

        return response()->json("Guarantee updated successfully!");
    }

    public function destroy($id)
    {
        Guarantee::where("id", $id)->delete();
        return response()->json("Guarantee deleted successfully!");
    }
}
