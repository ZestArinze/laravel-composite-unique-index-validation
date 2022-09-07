<?php

namespace App\Http\Requests;

use App\Rules\IsCompositeUnique;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', new IsCompositeUnique('subjects', ['title' => $this->title, 'course_id' => $this->course_id])],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
        ];
    }
}
