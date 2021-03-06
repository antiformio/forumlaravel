<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UsersRequest extends Request
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


    /**
     * Todos os campos que são obrigatórios aquando da criação,
     *          ou edição de utilizador
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email|max:255|unique:users',
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'required'
        ];
    }



}
