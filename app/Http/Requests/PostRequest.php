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
    public function authorize()
    {
        //limitar a usuarios {
            return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $post = $this->route()->parameter('post');

        $rules= [
            'name'=>'required',
            'slug'=>'required|unique:posts',
            'status'=>'required|in:1,2'

        ];
        if($post){
            $rules['slug']= 'required|unique:posts,slug,' .$post->id;
        }
        if($this->status==2){
            //Metodo de php paara agregar mas reglas encima dse las que ya estan 
            $rules=array_merge($rules,[
                'category_id'=>'required',
                'tags'=>'required',
                'extract'=>'required',
                'body'=>'required'
            ]);

        }
        return $rules;

    }
}
