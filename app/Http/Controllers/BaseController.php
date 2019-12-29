<?php

namespace App\Http\Controllers;

use App\Models\BaseModel;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected string $modelClassController;
    protected object $baseModel;

    public function __construct(BaseModel $baseModel)
    {
        $baseModel->init($this->modelClassController);
        $this->baseModel = $baseModel;
    }

    public function getAll()
    {
        return $this->baseModel->getAll();
    }

    public function getOne($id)
    {
        return $this->baseModel->getOne($id);
    }

    public function createOne(Request $request)
    {
        $modelData= $request->all();
        return $this->baseModel->createOne($modelData);
    }

    public function updateOne(Request $request, $id)
    {
        return $this->baseModel->updateOne();
    }

    public function deleteOne($id)
    {
        return $this->baseModel->deleteOne($id);
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
