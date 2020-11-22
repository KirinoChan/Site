<?php 

return array(
    'todo/(addtodo)' =>'todo/$1',
    'todo/(verifytodo)'=>'todo/$1',
    'todo/(setsort)' => 'todo/$1',
    'todo/(login)' => 'todo/$1',
    'todo/(logout)' => 'todo/$1',
    'todo/(edit)' => 'todo/$1',
    'news/([0-9]+)' => 'news/view/$1',
    '^([0-9]+)$' => 'todo/index/$1',
);