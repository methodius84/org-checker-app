<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @mixin IdeHelperOrganization
 */
class Organization extends Model
{
    use HasFactory;
    protected $table = 'organizations';
    protected $guarded = ['uuid', 'created_at', 'updated_at'];
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $casts = [
        'unreliability' => 'boolean'
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
