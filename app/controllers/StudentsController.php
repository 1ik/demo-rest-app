<?php
use demo\student\StudentRepository;

class StudentsController extends \BaseController {

	function __construct(StudentRepository $repository)
	{
		$this->students = $repository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->students->all();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /students/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /students
	 *
	 * @return Response
	 */
	public function store()
	{
		$student = $this->students->store();
		if($student != null)
		{
			return Response::json(['status' => 1, 'id' => $student->id ]);
		}
		return Response::json( ['status' => 0, 'messages' => $this->students->errors] );
	}

	/**
	 * Display the specified resource.
	 * GET /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$student = $this->students->find($id);
		if($student == null) 
		{
			return Response::json(['status' => 0, 'message' => 'Student not found']);
		}
		return $student;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /students/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->students->update(null,$id)) 
		{
			return Response::json(['status' => 1]);
		} else {
			return Response::json(['status' => 0, 'messages' => $this->students->errors ]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->students->destroy($id) != null) 
		{
			return Response::json(['status' => 1]);
		} else {
			return Response::json(['status' => 0, 'messages' => ['Deletion failed']]);
		}
	}

}