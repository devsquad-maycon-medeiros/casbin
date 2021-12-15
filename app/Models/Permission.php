<?php

namespace App\Models;

use Illuminate\Support\Str;

class Permission extends \Spatie\Permission\Models\Permission
{
    public function getDescriptionAttribute()
    {
        return Str::ucfirst($this->name);
    }
}
