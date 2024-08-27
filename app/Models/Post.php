<?php

namespace App\Models;

// use App\Models\Post;
// use Illuminate\Support\Arr;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function scopeFilter(Builder $query, array $filters): void
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {

            $query->where('title', 'like', '%' . request('search') . '%');
        });

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>

            $query->whereHas('category', fn($query) => $query->where(
                'slug',
                $category
            ))
        );


        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>

            $query->whereHas('author', fn($query) => $query->where(
                'username',
                $author
            ))
        );
    }

    // public static function all()
    // {
    //     return [
    //         [
    //             'id' => '1',
    //             'slug' => 'judul-article-1',
    //             'title' => 'Judul article 1',
    //             'author' => 'Hario Sejati',
    //             'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
    //             Quibusdam, sapiente aliquid.
    //             At repudiandae unde soluta.'
    //         ],
    //         [
    //             'id' => '2',
    //             'slug' => 'judul-article-2',
    //             'title' => 'judul article 2',
    //             'author' => 'Hario Sejati',
    //             'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
    //             Quibusdam, sapiente aliquid.
    //             At repudiandae unde soluta.'
    //         ]
    //     ];
    // }

    // public static function find($slug): array
    // {
    //     // return Arr::first(static::all(), function ($post) use ($slug) {
    //     //     return $post['slug'] == $slug;
    //     // });

    //     $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

    //     if (! $post) {
    //         abort(404);
    //     }

    //     return $post;
    // }
}
