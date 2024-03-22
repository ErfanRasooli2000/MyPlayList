<?php

namespace Modules\Song\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Album\Http\Resources\AlbumSelectResource;
use Modules\Artist\Http\Resources\ArtistResource;
use Modules\Artist\Http\Resources\ArtistSelectResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_fa' => $this->name_fa,
            'name_en' => $this->name_en,
            'lyric' => $this->whenLoaded("lyric" , function (){
                return $this->lyric->first()->lyric;
            }),
            'artist' => $this->whenLoaded("artists" , function (){
                return ArtistSelectResource::collection($this->artists);
            }),
            'url' => $this->whenLoaded('url' , function (){
                return $this->url?->url;
            }),
            'album' => $this->whenLoaded('album' , function (){
                return new AlbumSelectResource($this->album);
            })
        ];
    }
}
