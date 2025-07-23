<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\Post\PostService;

class PostController extends Controller
{
    public function __construct(protected PostService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->service->getAll();

        return view("post.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.form", ["post" => new Post()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route("posts.index")->with("message", "Post creado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->service->find($id);
        return view("post.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = $this->service->find($id);
        return view("post.form", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route("posts.index")->with("message", "Post actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route("posts.index")->with("message", "Post eliminado correctamente");
    }
}
