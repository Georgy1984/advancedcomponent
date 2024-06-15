<?php

//namespace  App\Controllers;

use App\QueryBuilder;

$db = new QueryBuilder();

/* $db->delete('posts', 1); */

$db->insert([
    'title' => 'go to homepage'

], 'posts');



/* $db->update([

    'title' => 'Rename the page',

], 1, 'posts');
*/

/*$posts = $db->getAll('posts');

var_dump($posts); */

























