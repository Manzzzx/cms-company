<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'status'];

    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }
}