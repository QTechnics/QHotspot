<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\RadReply
 *
 * @property int $id
 * @property string $UserName
 * @property string $Attribute
 * @property string $op
 * @property string $Value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadReply whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadReply whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadReply whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadReply whereValue($value)
 * @mixin \Eloquent
 */
class RadReply extends Model
{
    public $table = 'radreply';

    public $timestamps = false;

    public $fillable = [
        'UserName',
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
        'UserName' => 'string',
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
