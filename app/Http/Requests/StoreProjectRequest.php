<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|max:200|string',
            'content' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
            'link' => 'nullable',
            // 'slug' => ['required', 'max:255', Rule::unique('projects')->ignore($this->project)], // controllare se va tenuto o tolto
            'technologies' => 'exists:technologies,id'
        ];
    }
}
