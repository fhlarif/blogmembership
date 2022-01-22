<?php

namespace App\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{


    public function comments()
    {
        return $this->commentRelation;
    }


    public function commentRelation(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentRelation', 'commentable_id', 'commentable_type');
    }

    public function latestComments(int $amount = 5)
    {
        return $this->commentRelation()->latest()->limit($amount)->get();
    }

    public function deleteComments()
    {
        foreach ($this->commentRelation()->get() as $comment) {
            $comment->delete();
        }

        $this->unsetRelation('commentsRelation');
    }
}
