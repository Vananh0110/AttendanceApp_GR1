<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clazz;

class ClazzController extends Controller
{
    public function index()
    {
        $clazzes = Clazz::all();
        return response()->json($clazzes);
    }

    public function show($id)
    {
        $clazz = Clazz::findOrFail($id);
        return response()->json($clazz);
    }

    public function store(Request $request)
    {
        $clazz = Clazz::create($request->all());
        return response()->json($clazz, 201);
    }

    public function update(Request $request, $id)
    {
        $clazz = Clazz::findOrFail($id);
        $clazz->update($request->all());
        return response()->json($clazz, 200);
    }

    public function destroy($id)
    {
        $clazz = Clazz::findOrFail($id);
        $clazz->delete();
        return response()->json(null, 204);
    }
}
