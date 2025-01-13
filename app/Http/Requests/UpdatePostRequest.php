<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       return true;
    }

    public function messages(): array
{
    return [
        'name.required' => 'El nombre del post es obligatorio.',
        'slug.required' => 'El slug es obligatorio.',
        'slug.unique' => 'Este slug ya está en uso.',
        'status.required' => 'El estado es obligatorio.',
        'status.in' => 'El estado debe ser BORRADOR o PUBLICADO.',
        'image.required' => 'La imagen es obligatoria.',
        'category_id.required' => 'El campo categoría es obligatorio cuando el estado es PUBLICADO.',
        'tags.required' => 'Debe seleccionar al menos una etiqueta.',
        'extract.required' => 'El extracto es obligatorio cuando el estado es PUBLICADO.',
        'body.required' => 'El cuerpo del post es obligatorio cuando el estado es PUBLICADO.',
    ];
}


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug,' . $this->post->id,
            'status' => 'required|in:1,2',
            'file' => 'image',
        ];
    
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }





        return $rules;


    }
}
