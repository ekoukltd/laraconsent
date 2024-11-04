<?php

namespace Ekoukltd\LaraConsent\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ConsentOptionFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'key'               => 'required|string|max:191',
            'title'             => 'required|string|max:191',
            'label'             => 'required|string|max:191',
            'text'              => 'required|string',
            'enabled'           => 'boolean',
            'is_mandatory'      => 'boolean',
            'is_default'        => 'boolean',
            'published_at'      => 'required|date_format:Y-m-d H:i',
            'force_user_update' => 'boolean',
            'sort_order'        => 'integer',
            'models'            => [
                'array',
                Rule::in(config('laraconsent.models')),
            ],
        ];

        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        return $this->only([
                               'key',
                               'title',
                               'label',
                               'text',
                               'is_mandatory',
                               'is_current',
                               'is_default',
                               'published_at',
                               'enabled',
                               'force_user_update',
                               'sort_order',
                               'models'
                           ]);
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
                         'key' => Str::slug($this->key),
                     ]);
    }
}