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

    public function getAll(Request $request)
    {
        return $this->baseModel->getCollections($request->all())->get();
    }

    public function getOne(Request $request)
    {
        return $this->baseModel->getCollections($request->all(), $this->getRequestId($request))->first();
    }

    public function createOne(Request $request)
    {
        return $this->baseModel->createOne($request->all());
    }

    public function updateOne(Request $request)
    {
        return $this->baseModel->updateOne($request->all(), $this->getRequestId($request), 'user_id', Auth::id())
            ?: $this->responseWithError('This record does not belong to you', 403);
    }

    public function deleteOne(Request $request)
    {
        return $this->baseModel->deleteOne($this->getRequestId($request), 'user_id', Auth::id())
            ?: $this->responseWithError('This record does not belong to you', 403);
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
