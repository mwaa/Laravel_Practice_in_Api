<?php namespace lip\Transformers;
/**
 * Created by PhpStorm.
 * User: Mwaa
 * Date: 1/24/2015
 * Time: 2:05 PM
 */

abstract class Transformer {

    public function transformCollection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    public  abstract function transform($item);
} 