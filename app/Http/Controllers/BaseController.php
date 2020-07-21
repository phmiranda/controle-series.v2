<?php
/**
 * User: phmiranda
 * Project: controle-series-v2
 * Description: this file execute...!
 * Date: 20/07/2020
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class BaseController extends Controller {
    protected $class;

    public function index(Request $request) {
        $resource = $this->class::paginate($request->per_page);
        return $resource;
    }

    public function show(int $id) {
        $resource = $this->class::find($id);
        if (is_null($resource)){
            return response()->json('',204);
        }
        return response()->json($resource);
    }

    public function store(Request $request) {
        return response()->json($this->class::create($request->all()), 201);
    }

    public function update(Request $request, int $id) {
        $resource = $this->class::find($id);
        if (is_null($resource)){
            return response()->json(['erro' => 'Recurso não encontrato'], 404);
        }
        $resource->fill($request->all());
        $resource->save();
        return $resource;
    }

    public function destroy(int $id) {
        $resource = $this->class::destroy($id);
        if ($resource === 0){
            return response()->json(['erro' => 'Recurso não encontrado',404]);
        }
        return response()->json('',204);
    }
}
