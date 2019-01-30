<?php

class FfController
{
    public function ff()
    {
        $view = new View();
        $posts = [
            'First Post',
            'Second Post'
        ];

        $view->render('index', [
            "posts" => $posts
        ]);
    }
}