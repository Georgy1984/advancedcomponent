<?php

//namespace  App\Controllers;

use App\QueryBuilder;

$db = new QueryBuilder();
$db->update([

    'title' => 'Go to Main Page',

], 1, 'posts');




/*
class Homepage
{
    public function show() {

        $db = new QueryBuilder();

        $posts = $db->getAll('posts');


}

}

*/


















