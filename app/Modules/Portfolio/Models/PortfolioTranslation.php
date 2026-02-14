<?php

namespace Modules\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioTranslation extends Model
{
    protected $fillable = [
        'portfolio_id',
        'locale',
        'title',
        'description',
        'meta_title',
        'meta_description',
    ];
}
