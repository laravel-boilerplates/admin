<?php

namespace LaravelBoilerplates\Admin\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
      $rules = [
        'name' => 'required',
        'label' => 'required',
        'description' => 'max:100'
      ];

      if ($this->getMethod() == 'POST') {
          return array_merge($rules, $this->postRules());
      } else {
          return array_merge($rules, $this->putRules());
      }
    }

    /**
     * Get the validation rules that apply to a POST request.
     *
     * @return array
     */
    public function postRules() : array
    {
      return [];
    }
    /**
     * Get the validation rules that apply to a PUT request.
     *
     * @return array
     */
    public function putRules() : array
    {
      return [];
    }
}
