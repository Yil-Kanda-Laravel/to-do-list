<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['name', 'date'];

    public function authorize()
	{
		return true;
	}
	public function rules()
 	{
		return [
		'name' => 'required',
		'date' => 'required',
		];
	}
	public function messages()
	{
		return [
		'name.required' => 'El campo Tarea es obligatorio',
		'date.required' => 'El campo Fecha de la tarea es obligatorio',
		];
	}
}
