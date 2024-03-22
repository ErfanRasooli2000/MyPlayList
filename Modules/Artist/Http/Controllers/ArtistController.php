<?php

namespace Modules\Artist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Artist\Database\Repositories\Contracts\ArtistRepositoryInterface;
use Modules\Artist\Http\Requests\ArtistCreateRequest;
use Modules\Artist\Http\Resources\ArtistResource;
use Modules\Artist\Models\Artist;

class ArtistController extends Controller
{
    public function __construct(protected ArtistRepositoryInterface $artistRepository){}

    public function list(Request $request)
    {
        $result = $this->artistRepository->getAllWithPagination($request);
        $result = ArtistResource::collection($result);

        return $this->successResponse(
            $result,
            200,
            null,
            $result->response()->getData()->meta
        );
    }

    public function show($artist)
    {
        //todo : model binding not working
        $artist = Artist::find($artist);
        return $this->successResponse(new ArtistResource($artist));
    }

    public function update($artist , ArtistCreateRequest $request)
    {
        //todo : model binding not working
        $artist = Artist::find($artist);

        $this->artistRepository->update($artist , $request->validated());

        return $this->successResponse(null , 201 , "آرتیست با موفقیت به روز شد");
    }
    public function create(ArtistCreateRequest $request)
    {
        $this->artistRepository->create($request->validated());

        return $this->successResponse(null , 201 , "آرتیست با موفقیت ساخته شد");
    }
}
