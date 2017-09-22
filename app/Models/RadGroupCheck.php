<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\RadGroupCheck
 *
 * @property int $id
 * @property string $GroupName
 * @property string $Attribute
 * @property string $op
 * @property string $Value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupCheck whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupCheck whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupCheck whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupCheck whereValue($value)
 * @mixin \Eloquent
 */
class RadGroupCheck extends Model
{
    public $table = 'radgroupcheck';

    public $timestamps = false;

    public $fillable = [
        'GroupName',
        'Attribute',
        'op',
        'Value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'GroupName' => 'string',
        'Attribute' => 'string',
        'op' => 'string',
        'Value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
