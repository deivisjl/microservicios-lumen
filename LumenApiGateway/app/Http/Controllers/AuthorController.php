<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\AuthorService;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;

    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthors($request->all()), Response::HTTP_CREATED);
    }   
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author), Response::HTTP_FOUND);
    }
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(),$author), Response::HTTP_FOUND);
    }
    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
