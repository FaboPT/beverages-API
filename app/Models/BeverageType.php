<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeverageType extends Model
{
    use SoftDeletes;

    protected $table = 'beverage_types';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'description'];
    protected $hidden = ['deleted_at'];


    public function beverages(): HasMany
    {
        return $this->hasMany(Beverage::class, 'beverage_type_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(static function ($beverageType) {
//            $beverageType->beverages()->delete();  --> not working in multi HasMany
            foreach ($beverageType->beverages as $beverage) {
                $beverage->delete();
            }
        });
    }
}
