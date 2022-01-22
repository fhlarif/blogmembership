<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface CommentAble

{
    public function title();

    public function comments();

    public function latestComments(int $amount = 5);

    public function deleteComments();

    public function commentRelation(): MorphMany;

    public function commentAbleTitle(): string;
}
