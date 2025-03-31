<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $rules = [
            'title' => 'required|unique:tasks|max:255'
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'title' => 'required',"unique:tasks,title,{$this->id},id",'max:255',
            ];
        }
        return $rules;
    }
}
