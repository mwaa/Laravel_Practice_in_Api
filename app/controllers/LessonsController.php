<?php

class LessonsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lessons = Lesson::all();
		return Response::json([
            'data' => $this->transformCollection($lessons)
        ],200);
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
            return Response::json([
                'error' => [
                    'message' => 'Lesson does not exist'
                ]
            ],404);
        }

        return Response::json([
            'data' => $this->transform($lesson->toArray())
        ],200);
	}


	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    private function transformCollection($lessons)
    {
        return array_map([$this,'transform'],$lessons->toArray());
    }

    private function transform($lesson)
    {
        return [
                'title' => $lesson['title'],
                'body' => $lesson['body'],
                'active' => (boolean)$lesson['some_bool']
        ];
    }
}
