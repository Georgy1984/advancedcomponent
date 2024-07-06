<?php

use function Tamtamchik\SimpleFlash\flash;
$this->layout('layout', ['title' => 'User Profile']) ?>
<?= flash()->display() ?>


<h1>About page</h1>
<p> <?= $title = 'Georgy about';
    $this->e($title); ?> </p>
