<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class BaseController extends Controller
{
    protected string $modelClassController;
    protected object $baseModel;

    public function __construct()
    {
        $this->baseModel = new $this->modelClassController;
    }

    public function getTableSingularName()
    {
        return $this->baseModel->getTableSingularName();
    }

    public function getTablePluralName()
    {
        return $this->baseModel->getTablePluralName();
    }

    public function getAllCollectionsWithTranslate()
    {
        return $this->baseModel->getAllCollectionsWithTranslate();
    }

    public function getAll()
    {
        return $this->baseModel->getAll();
    }

    public function getOne(Request $request)
    {
        return $this->baseModel->getOne($this->getRequestId($request));
    }

    public function createOne(Request $request)
    {
        $modelData= $request->all();
        return $this->baseModel->createOne($modelData);
    }

    public function updateOne(Request $request)
    {
        $modelData= $request->all();
        return $this->baseModel->updateOne($modelData, $this->getRequestId($request));
    }

    public function deleteOne(Request $request)
    {
        return $this->baseModel->deleteOne($this->getRequestId($request));
    }

    public function getRequestId(Request $request): int {
        return intval($request->route('id'));
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
