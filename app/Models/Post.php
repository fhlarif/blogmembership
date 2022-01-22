<?php

namespace App\Models;

use App\Traits\HasTags;
use App\Casts\TitleCast;
use App\Traits\HasAuthor;
use App\Traits\HasComments;
use Illuminate\Support\Str;
use App\Contracts\CommentAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements CommentAble
{
    use HasFactory;
    use HasAuthor;
    use HasTags;
    use HasComments;

    const TABLE = 'posts';

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'cover_image',
        'is_commentable',
        'published_at',
        'type',
        'photo_credit_text',
        'photo_credit_link',
        'author_id',
    ];

    //eager load the relationship
    protected $with = [
        'authorRelation',
        // 'commentRelations',
        'tagsRelation'

    ];

    protected $casts = [
        'published_at' => 'datetime',
        'title' => TitleCast::class,
        'is_commentable' => 'boolean',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body), $limit);
    }

    public function coverImage(): string
    {
        return $this->cover_image;
    }

    public function delete()
    {
        $this->removeTags();
        parent::delete();
    }

    public function commentAbleTitle(): string
    {
        return $this->title();
    }
}
