<?php

namespace App\Models;

use App\Contracts\CommentAble;
use App\Traits\HasAuthor;
use App\Traits\ModelHelpers;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    use HasAuthor;
    use ModelHelpers;

    const TABLE = 'comments';

    protected $table = self::TABLE;

    protected $fillable = [
        'body',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 100): string
    {
        return Str::limit($this->body(), $limit);
    }

    public function commentAbleRelation(): MorphTo
    {
        return $this->morphTo('commentableRelation', 'commentable_id', 'commentable_type');
    }

    public function commentAble(): CommentAble
    {
        return $this->commentAbleRelation;
    }
}
