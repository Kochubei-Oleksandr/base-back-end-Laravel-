<?php

namespace App\Http\Controllers;

use App\Models\BaseModel;
use App\Traits\BaseModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class BaseController extends Controller
{
//    use BaseModelTrait {
//        BaseModelTrait::init(Region::class);
//    }

    protected string $modelClassController;
    protected object $baseModel;
    protected Request $request;
    protected int $id;
    protected int $userId;

    public function __construct(
        BaseModel $baseModel,
        Request $request
    )
    {
        dd([$this->modelClassController, 'modelClassController']);
//        $this->baseModel = $baseModel->__construct($this->modelClassController);
//        $this->baseModel->__construct($this->modelClassController);
//        dd($baseModel);
//        $this->request = $request;
        $this->id = intval($request->route('id'));
//        $this->userId = Auth::id();
    }

    public function getAllCollectionsWithTranslate()
    {
        return $this->baseModel->getAllCollectionsWithTranslate();
    }

    public function getAll()
    {
        return $this->baseModel->getAll();
    }

    public function getOne()
    {
        return $this->baseModel->getOne($this->id);
    }

    public function createOne()
    {
        $modelData= $this->request->all();
        return $this->baseModel->createOne($modelData);
    }

    public function updateOne()
    {
        $modelData= $this->request->all();
        return $this->baseModel->updateOne($modelData, $this->id);
    }

    public function deleteOne()
    {
        return $this->baseModel->deleteOne($this->id);
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
