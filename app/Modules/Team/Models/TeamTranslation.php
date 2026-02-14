<?php

namespace Modules\Team\Models;

use Illuminate\Database\Eloquent\Model;

class TeamTranslation extends Model
{
    protected $fillable = [
        'team_id',
        'locale',
        'bio',
    ];
}
