<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'thread.title'=>'required|string|max:100',
            'thread.article'=>'required|string|max:4000',
            'comment.article'>'required|string|max:4000',
        ];
    }
}
