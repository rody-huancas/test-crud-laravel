<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostService
{

    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = Post::query();

        if (!empty($filters['status'])) {
            $query = Post::where('status', $filters['status']);
        }

        return $query->paginate(Post::PAGINATE);
    }

    public function find(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Post::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Post::where('id', $id)->delete();
    }
}
