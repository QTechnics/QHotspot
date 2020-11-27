<?php

namespace App\Models;

use Eloquent as Model;

/**
 * App\Models\RadCheck.
 *
 * @property int                 $id
 * @property string              $UserName
 * @property string              $Attribute
 * @property string              $op
 * @property string              $Value
 * @property string              $TcKimlikNo
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereTcKimlikNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadCheck whereValue($value)
 * @mixin \Eloquent
 */
class RadCheck extends Model
{
    public $table = 'radcheck';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'UserName',
        'Attribute',
        'op',
        'Value',
        'TcKimlikNo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'UserName'   => 'string',
        'Attribute'  => 'string',
        'op'         => 'string',
        'Value'      => 'string',
        'TcKimlikNo' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];
}
