<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class BooksController extends AppController
{

    public function index()
    {
      $this->books = (new Books())->find();
    }

    public function nuevo()
    {
      $this->authors = (new Authors())->find();

      if(Input::hasPost("books")) {
        $params = Input::post("books");
        $books = new Books($params);

        //$books->authors_id = 1;
        if ($books->save()) {
          Flash::valid("SEguardo");
        } else {
          Flash::error("Error");
        }
      }
    }
}
