<?php

namespace App\Http\Controllers;

use App\Models\AreaGraduate;
use Illuminate\Http\Request;

class AreaGraduateController extends Controller
{
    public function index()
    {
        $areaGraduates = AreaGraduate::query()
            ->included()
            ->filter()
            ->filterStrict()
            ->search()
            ->sort()
            ->getOrPaginate();

        return response()->json($areaGraduates);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'area_knowledge_id' => 'required|integer|exists:area_knowledge,id',
            'graduate_id' => 'required|integer|exists:graduates,id',
        ]);

        $areaGraduate = AreaGraduate::create($validatedData);
        return response()->json($areaGraduate, 201);
    }

    public function show($id)
    {
        $areaGraduate = AreaGraduate::query()
            ->where('id', $id)
            ->included()
            ->first();

        if (!$areaGraduate) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($areaGraduate);
    }

    public function update(Request $request, $id)
    {
        $areaGraduate = AreaGraduate::find($id);

        if (!$areaGraduate) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'area_knowledge_id' => 'integer|exists:area_knowledge,id',
            'graduate_id' => 'integer|exists:graduates,id',
        ]);

        $areaGraduate->update($validatedData);
        return response()->json($areaGraduate);
    }

    public function destroy($id)
    {
        $areaGraduate = AreaGraduate::find($id);

        if (!$areaGraduate) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $areaGraduate->delete();
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }
}