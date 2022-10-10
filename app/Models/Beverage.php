<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beverage extends Model
{
    use SoftDeletes;

    protected $table = 'beverages';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'description', 'beverage_type_id'];
    protected $hidden = ['beverage_type_id', 'deleted_at'];


    public function beverageType(): BelongsTo
    {
        return $this->belongsTo(BeverageType::class, 'beverage_type_id', 'id');
    }

    public function favorites(): HasMany
    {
        return $this->HasMany(FavoriteList::class, 'beverage_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(static function ($beverage) {
//            $beverage->favorites()->delete(); --> not working in multi HasMany
            foreach ($beverage->favorites as $favorite) {
                $favorite->delete();
            }
        });
    }

}
