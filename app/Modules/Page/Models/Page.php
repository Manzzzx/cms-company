<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = ['slug', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }
}