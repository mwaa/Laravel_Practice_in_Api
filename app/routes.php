<?php

Route::get('/',function(){
    return Redirect::to('/api/v1/lessons');
});
Route::group(['prefix' => 'api/v1'],function()
{
    Route::get('lessons/{id}/tags','TagsController@index');
    Route::resource('lessons','LessonsController');
    Route::resource('tags','TagsController',['only'=> ['index','show']]);

});
