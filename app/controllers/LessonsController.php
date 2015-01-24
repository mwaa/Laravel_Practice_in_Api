<?php

use lip\Transformers\LessonTransformer;

class LessonsController extends ApiController {

    /**
     * @var lip\Transformers\LessonTransformer
     */
    protected $lessonTransformer;

    /**
     * @param LessonTransformer $lessonTransformer
     */
    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->beforeFilter('auth.basic',['on' => 'post']);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lessons = Lesson::all();
		return Response::json([
            'data' => $this->lessonTransformer->transformCollection($lessons->all())
        ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $lesson = Lesson::find($id);

        if(!$lesson)
        {
            return $this->respondNotFound('Lesson does not exist.');

        }

        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
	}

    /**
     *
     */
    public function store()
    {
        if( !Input::get('title') or !Input::get('body'))
        {
            return $this->respondFailedValidation('Parameters failed validation for a lesson.');
        }

        Lesson::create(Input::all());

        return $this->responseCreated('Lesson successfully created.');
    }




}
