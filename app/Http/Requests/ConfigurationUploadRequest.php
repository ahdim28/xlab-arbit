<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationUploadRequest extends FormRequest
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

    public function rules()
    {
        return [
            $this->name => 'required|mimes:'.config('custom.files.config.'.$this->name.'.mimes'),
        ];
    }

    public function attributes()
    {
        return [
            $this->name => str_replace('_', ' ', strtoupper($this->name)),
        ];
    }

    public function messages()
    {
        return [
            $this->name.'.required' => ':attribute is required',
            $this->name.'.mimes' => ':attribute must be a file of type: :values.',
        ];
    }
}
