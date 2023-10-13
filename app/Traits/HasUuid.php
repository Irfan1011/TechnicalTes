<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
