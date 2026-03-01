<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Article extends Model
{
    use HasFactory;
    protected $appends = ['name_user', 'created_at', 'updated_at'];

    protected $casts = ['crated_at'=>'date', 'updated_at' =>'date'];

    protected $guarded = ['id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function nameUser():Attribute
    {
        return Attribute::make(
            get: fn($a,$v) => $this->user->name
        );
    }
    protected function createdAt():Attribute
    {
        return Attribute::make(
            get: fn($a,$v) => Carbon::parse($a)->format('Y.m.d')
        );
    }
    protected function updatedAt():Attribute
    {
        return Attribute::make(
            get: fn($a,$v) => Carbon::parse($a)->format('Y.m.d')
        );
    }
}
