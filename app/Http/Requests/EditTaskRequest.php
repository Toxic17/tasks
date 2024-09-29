<?php

namespace App\Http\Requests;

use App\Rules\checkboxRule;
use Illuminate\Foundation\Http\FormRequest;

class EditTaskRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'string|max:10000',
            'user_id' => 'exists:App\Models\User,id',
            'completed'=> 'required|boolean',
        ];
    }
    public function prepareForValidation()
    {
        if($this->request->get('completed') == "on")
        {
            $this->request->remove('completed');
            $this->request->add(['completed'=>true]);
        }
        else
        {
            $this->request->add(['completed'=>false]);
        }
    }
}
