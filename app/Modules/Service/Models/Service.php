<?php

namespace Modules\Service\Models;

use App\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = ['slug', 'status', 'icon'];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected string $translationModel = ServiceTranslation::class;
}
