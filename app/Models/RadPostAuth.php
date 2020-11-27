<?php

namespace App\Models;

use Eloquent as Model;

/**
 * App\Models\RadPostAuth.
 *
 * @property int    $id
 * @property string $username
 * @property string $pass
 * @property string $reply
 * @property string $authdate
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadPostAuth whereAuthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadPostAuth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadPostAuth wherePass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadPostAuth whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadPostAuth whereUsername($value)
 * @mixin \Eloquent
 */
class RadPostAuth extends Model
{
    public $table = 'radpostauth';

    public $timestamps = false;

    public $fillable = [
        'username',
        'pass',
        'reply',
        'authdate',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'       => 'integer',
        'username' => 'string',
        'pass'     => 'string',
        'reply'    => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];
}
