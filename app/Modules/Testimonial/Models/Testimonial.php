<?php

namespace Modules\Testimonial\Models;

use App\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = ['client_name', 'company', 'rating', 'status'];

    protected $casts = [
        'status' => 'boolean',
        'rating' => 'integer',
    ];

    protected string $translationModel = TestimonialTranslation::class;
}
