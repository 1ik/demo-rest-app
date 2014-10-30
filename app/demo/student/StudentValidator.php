<?php
namespace demo\student;

class StudentValidator {

	public $errors;
	public static $rules = [
		'first_name' => 'required',
		'last_name'	=> 'required',
		'email'	=> 'required|unique:students,email',
		'age'	=> 'required|numeric|min:10|max:30',
	];

	public function validate($properties = null)
	{
		$properties = $properties == null ? \Input::except("_token") : $properties;

		$validator = \Validator::make($properties, static::$rules);

		if($validator->passes())
		{
			return true;
		}

		$this->errors = $validator->messages();
		return false;
	}
}