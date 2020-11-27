<?php

namespace App\Models;

use Eloquent as Model;

/**
 * App\Models\RadGroupReply.
 *
 * @property int    $id
 * @property string $GroupName
 * @property string $Attribute
 * @property string $op
 * @property string $Value
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupReply whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupReply whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupReply whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadGroupReply whereValue($value)
 * @mixin \Eloquent
 */
class RadGroupReply extends Model
{
    public $table = 'radgroupreply';

    public $timestamps = false;

    public $fillable = [
        'GroupName',
        'Attribute',
        'op',
        'Value',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'GroupName' => 'string',
        'Attribute' => 'string',
        'op'        => 'string',
        'Value'     => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];
}
