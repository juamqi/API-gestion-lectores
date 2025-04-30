<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectorController extends Controller
{
    /**
     * Mostrar listado de todos los lectores
     */
    public function index()
    {
        $lectores = Lector::all();
        return response()->json($lectores, 200);
    }

    /**
     * Almacenar un nuevo lector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:lectores,email|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lector = Lector::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);

        return response()->json($lector, 201);
    }

    /**
     * Mostrar un lector específico
     */
    public function show($id)
    {
        $lector = Lector::find($id);

        if (!$lector) {
            return response()->json(['message' => 'Lector no encontrado'], 404);
        }

        return response()->json($lector, 200);
    }

    /**
     * Actualizar un lector existente
     */
    public function update(Request $request, $id)
    {
        $lector = Lector::find($id);

        if (!$lector) {
            return response()->json(['message' => 'Lector no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:lectores,email,'.$id,
            'direccion' => 'sometimes|required|string|max:255',
            'telefono' => 'sometimes|required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lector->update($request->only(['nombre', 'apellido', 'email', 'direccion', 'telefono']));

        return response()->json($lector, 200);
    }

    /**
     * Eliminar un lector
     */
    public function destroy($id)
    {
        $lector = Lector::find($id);

        if (!$lector) {
            return response()->json(['message' => 'Lector no encontrado'], 404);
        }

        $lector->delete();

        return response()->json(['message' => 'Lector eliminado correctamente'], 200);
    }
}
