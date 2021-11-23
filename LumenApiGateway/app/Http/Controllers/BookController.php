<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    public $bookService;
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }
    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);
        
        return $this->successResponse($this->bookService->createBooks($request->all()), Response::HTTP_CREATED);
    }   
    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book), Response::HTTP_FOUND);
    }
    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(),$book), Response::HTTP_FOUND);
    }
    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
