<?php

namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [
        'service_id',
        'locale',
        'title',
        'description',
        'meta_title',
        'meta_description',
    ];
}
