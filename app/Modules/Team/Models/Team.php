<?php

namespace Modules\Team\Models;

use App\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = ['name', 'position', 'photo', 'linkedin', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected string $translationModel = TeamTranslation::class;
}
