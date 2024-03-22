<?php

namespace Modules\Album\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Album\Database\Repositories\Contracts\AlbumRepositoryInterface;
use Modules\Album\Http\Requests\AlbumCreateRequest;
use Modules\Album\Http\Resources\AlbumResource;
use Modules\Album\Http\Resources\AlbumSelectResource;
use Modules\Album\Models\Album;

class AlbumController extends Controller
{
    public function __construct(protected AlbumRepositoryInterface $albumRepository){}

    public function list(Request $request)
    {
        $result = $this->albumRepository->getAllWithPagination($request);
        $result = AlbumResource::collection($result);

        return $this->successResponse(
            $result,
            200,
            null,
            $result->response()->getData()->meta
        );

    }

    public function show($album)
    {
        $album = Album::find($album);
        return $this->successResponse(new AlbumResource($album));
    }

    public function create(AlbumCreateRequest $request)
    {
        $this->albumRepository->create($request->validated());

        return $this->successResponse(null , 201 , "آلبوم با موفقیت ساخته شد");
    }

    public function update($album , AlbumCreateRequest $request)
    {
        $album = Album::find($album);
        $this->albumRepository->update($album , $request->validated());

        return $this->successResponse(null , 201 , "آلبوم با موفقیت به روز شد");
    }

    public function getForSelect()
    {
        return $this->successResponse(
            AlbumSelectResource::collection($this->albumRepository->getForSelect())
        );
    }
}
