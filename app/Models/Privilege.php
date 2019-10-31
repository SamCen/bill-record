<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Privilege
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Privilege newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Privilege newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Privilege query()
 * @mixin \Eloquent
 */
class Privilege extends Model
{
    protected $primaryKey = 'code';

    protected $keyType = 'string';
}
