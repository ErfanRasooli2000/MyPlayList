<?php

namespace Modules\PanelUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\PanelUser\Database\Repositories\Contracts\PanelUserRepositoryInterface;
use Modules\PanelUser\Http\Requests\PanelLoginRequest;
use Modules\PanelUser\Http\Resources\PanelUserDataResource;

class PanelUserController extends Controller
{
    public function __construct(protected PanelUserRepositoryInterface $panelUserRepository){}

    public function login(PanelLoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data))
        {
            $user = Auth::user();

            return $this->successResponse([
                "token" => $user->createToken("api")->plainTextToken,
                "data" => new PanelUserDataResource($user)
            ]);
        }
        else
        {
            return $this->errorResponse("کاربری با مشخصات داده شده یافت نشد");
        }
    }

    public function userData()
    {
        $user = Auth::user();
        return $this->successResponse(new PanelUserDataResource($user));
    }
}
