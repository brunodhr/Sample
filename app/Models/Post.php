<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected static $relationships = [];
    protected $table = 'posts';

    public static function getRelationship($id)
    {
        if (!isset(self::$relationships[$id])) {
            self::$relationships[$id] = self::find($id);
        }

        return self::$relationships[$id];
    }
}
