<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\AuthorService;

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

    }
    public function store(Request $request)
    {

    }
    public function show($author)
    {

    }
    public function update(Request $request, $author)
    {

    }
    public function destroy($author)
    {

    }
}
