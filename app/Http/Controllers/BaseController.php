<?php


namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    /** @var Model $modelClass */
    protected $modelClass;

    public function index()
    {
        return $this->modelClass::all();
    }

    public function store(Request $request)
    {
        $modelData = $request->all();
        return $this->modelClass::create($modelData);
    }

    public function show($id)
    {
        return $this->modelClass::find($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return $this->modelClass::destroy($id);
    }

    protected function successResponse($responseData)
    {
        return response()->json($responseData, 200);
    }

    protected function responseWithError(string $error, int $code)
    {
        return response()->json(['error' => $error], $code);
    }
}
