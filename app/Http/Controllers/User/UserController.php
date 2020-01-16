<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\User\UserRequest;
use App\Models\Location\City\City;
use App\Models\Location\Region\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * the name of the model must be indicated in each controller
     * @var string
     */
    protected string $modelClassController = User::class;
    protected string $requestClassController = UserRequest::class;

    protected function addLocationForUser($userData)
    {
        if ($userData->city_id) {
            $city = City::find($userData->city_id);
            $region = Region::find($city->region_id);

            $userData->{"region_id"} = $city->region_id;
            $userData->{"country_id"} = $region->country_id;
        }

        return $userData;
    }

    public function getOne(Request $request)
    {
        $userData = $this->baseModel->getCollections($request->all(), Auth::id())->first();

        return $this->addLocationForUser($userData);
    }

    public function updateOne(Request $request)
    {
        if ($this->isValidateError($request)) {
            return $this->isValidateError($request);
        }

        $userData = $this->baseModel->updateOne($request->all(), $this->getRequestId($request), 'id', Auth::id());

        return $userData
            ? $this->addLocationForUser($userData)
            : $this->responseWithError('This record does not belong to you', 403);
    }
}
