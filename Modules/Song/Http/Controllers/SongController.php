<?php

namespace Modules\Song\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Song\Database\Repositories\Contracts\SongRepositoryInterface;
use Modules\Song\Http\Requests\GroupUploadSongExcelRequest;
use Modules\Song\Http\Requests\SongCreateRequest;
use Modules\Song\Http\Resources\SongResource;
use Modules\Song\Models\Song;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    public function groupCreate(GroupUploadSongExcelRequest $request)
    {
        $date = Carbon::now();
        $path = 'groupUploadExcel/' . $date->format('Y') . '/' . $date->format('m');
        $fileName = Auth::id() . '_' . time() . '.' . $request->file('file')->extension();
        $filePath = $request->file('file')->storeAs($path, $fileName);
        $data = [];

        if($filePath)
        {
            if ($request->file('file')->extension() === 'xlsx') {
                $reader = IOFactory::createReader('Xlsx');
            }else {
                $reader = IOFactory::createReader('Xls');
            }
            $excel = $reader->load(storage_path('app/'.$path.'/'.$fileName))->getActiveSheet()->toArray();
            array_shift($excel);

            $count = $this->songRepository->groupCreate($excel);

            return $this->successResponse([
                'count' => $count
            ]);
        }

        return $this->errorResponse('در ذخیره سازی فایل خطایی رخ داده');
    }
}
