<?php namespace lip\Transformers;


class TagTransformer extends Transformer {

    public function transform($tag)
    {
        return [
            'title' => $tag['name']
        ];
    }
}