<?php

namespace App\Http\Controllers\UserOption;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CalorieCalculatorRequest;
use App\Models\User;
use App\Models\UserOption\Height;
use App\Models\UserOption\Weight;
use Illuminate\Http\Request;

class CalorieCalculatorController extends BaseController
{
    /**
     * the name of the model must be indicated in each controller
     * @var string
     */
    protected string $modelClassController = User::class;
    protected string $requestClassController = CalorieCalculatorRequest::class;
    protected User $userModel;
    protected Weight $weight;
    protected Height $height;

    public function __construct(User $userModel, Weight $weight, Height $height)
    {
        $this->weight = $weight;
        $this->height = $height;
        $this->userModel = $userModel;
        parent::__construct();
    }

    public function getOne(Request $request)
    {
        return $this->userModel->getUserParameters($request, $this->weight, $this->height);
    }

    public function updateOne(Request $request)
    {
        if ($this->isValidateError($request)) {
            return $this->isValidateError($request);
        }

        return $this->userModel->updateUserParameters($request, $this->weight, $this->height)
            ?: $this->responseWithError('This record does not belong to you', 403);
    }
}
