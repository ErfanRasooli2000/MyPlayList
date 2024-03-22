<?php

namespace Modules\Song\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Song\Database\Repositories\Contracts\SongRepositoryInterface;
use Modules\Song\Http\Requests\SongCreateRequest;
use Modules\Song\Http\Resources\SongResource;
use Modules\Song\Models\Song;

class SongController extends Controller
{
    public function __construct(protected SongRepositoryInterface $songRepository){}
    public function list(Request $request)
    {
        $result = SongResource::collection($this->songRepository->getAllWithPagination($request));

        return $this->successResponse(
            $result,
            200,
            null,
            $result->response()->getData()->meta
        );
    }

    public function create(SongCreateRequest $request)
    {
        $this->songRepository->create($request->validated());

        return $this->successResponse(null , 201 , "موزیک ساخته شد");
    }

    public function show($song)
    {
        $song = Song::where("id" , $song)->with(["url" , 'album' , 'artists' , 'lyric'])->first();

        return $this->successResponse(
            new SongResource($song)
        );
    }

    public function update($song , SongCreateRequest $request)
    {
        $song = Song::find($song);

        $this->songRepository->update($song , $request->validated());

        return $this->successResponse(null , 201 , "موزیک ویرایش شد");
    }
}
