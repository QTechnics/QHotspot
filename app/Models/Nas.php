<?php

namespace App\Models;

use Eloquent as Model;

/**
 * App\Models\Nas.
 *
 * @property int    $id
 * @property string $nasname
 * @property string $shortname
 * @property string $type
 * @property int    $ports
 * @property string $secret
 * @property string $server
 * @property string $community
 * @property string $description
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereNasname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas wherePorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereShortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nas whereType($value)
 * @mixin \Eloquent
 */
class Nas extends Model
{
    public $table = 'nas';

    public $timestamps = false;

    public $fillable = [
        'nasname',
        'shortname',
        'type',
        'ports',
        'secret',
        'community',
        'description',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'nasname'     => 'string',
        'shortname'   => 'string',
        'type'        => 'string',
        'ports'       => 'integer',
        'secret'      => 'string',
        'community'   => 'string',
        'description' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];
}
