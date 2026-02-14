<?php

namespace Modules\Portfolio\Models;

use App\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = ['slug', 'status', 'client', 'image', 'url'];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected string $translationModel = PortfolioTranslation::class;
}
