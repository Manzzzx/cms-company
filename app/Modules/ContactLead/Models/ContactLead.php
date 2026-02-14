<?php

namespace Modules\ContactLead\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message'];
}
