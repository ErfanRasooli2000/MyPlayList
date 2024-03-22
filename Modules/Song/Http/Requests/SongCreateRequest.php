<?php

namespace Modules\Song\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name_fa" => "nullable|string",
            "name_en" => "required|string",
            "url" => "required|string",
            "lyrics" => "nullable",
            'album' => "nullable|exists:albums,id",
            'artists' => "required|array",
            "artists.*" => "required|exists:artists,id"
        ];
    }
}
