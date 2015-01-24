<?php namespace lip\Transformers;
/**
 * Created by PhpStorm.
 * User: Mwaa
 * Date: 1/24/2015
 * Time: 2:06 PM
 */

class LessonTransformer extends Transformer {

    public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean)$lesson['some_bool']
        ];
    }
}