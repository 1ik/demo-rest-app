<?php
namespace demo\student;
use \Student;

class StudentRepository {

	public $errors;


	public function all() 
	{
		return Student::all();
	}


	public function store($prop = null)
	{
		$prop = $prop == null ? \Input::except('_token') : $prop;
		$validator = new StudentValidator;
		if($validator->validate())
		{
			return Student::create($prop);
		}
		$this->errors = $validator->errors;
		return NULL;
	}






	public function find($student_id) 
	{
		return Student::find($student_id);
	}





	public function update($prop, $id) 
	{
		$prop = $prop == null ? \Input::except('_token') : $prop;
		StudentValidator::$rules['email'] .= ',' . $id; // should ignore own id while validaing unique email.
		$validator = new StudentValidator;
		if($validator->validate())
		{
			$student = Student::find($id);
			if($student == null)
			{
				$this->errors[] = 'Student with id ' . $id . ' not found.';
				return false; 
			}

			$student->update($prop);
			return true;
		}
		$this->errors = $validator->errors;
		return false;

	}



	public function destroy($id)
	{	
		$student = Student::find($id);
		if($student != NULL) 
		{
			$student->delete();
			return true;	
		}
		return false;
	}
}

