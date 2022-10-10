<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoriteList extends Model
{
    use SoftDeletes;

    protected $table = 'favorites_list';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'description', 'user_id', 'beverage_id'];
    protected $hidden = ['deleted_at', 'id', 'user_id', 'beverage_id'];


    public function beverage(): BelongsTo
    {
        return $this->belongsTo(Beverage::class, 'beverage_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
