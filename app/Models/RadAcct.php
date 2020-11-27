<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;

/**
 * App\Models\RadAcct.
 *
 * @property int            $RadAcctId
 * @property string         $AcctSessionId
 * @property string         $AcctUniqueId
 * @property string         $UserName
 * @property string         $Realm
 * @property string         $NASIPAddress
 * @property string         $NASPortId
 * @property string         $NASPortType
 * @property \Carbon\Carbon $AcctStartTime
 * @property \Carbon\Carbon $AcctStopTime
 * @property int            $AcctSessionTime
 * @property string         $AcctAuthentic
 * @property string         $ConnectInfo_start
 * @property string         $ConnectInfo_stop
 * @property int|null       $AcctInputOctets
 * @property int|null       $AcctOutputOctets
 * @property string         $CalledStationId
 * @property string         $CallingStationId
 * @property string         $AcctTerminateCause
 * @property string         $ServiceType
 * @property string         $FramedProtocol
 * @property string         $FramedIPAddress
 * @property int            $AcctStartDelay
 * @property int            $AcctStopDelay
 * @property-write mixed $acct_start_time
 * @property-write mixed $acct_stop_time
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctAuthentic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctInputOctets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctOutputOctets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctSessionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctStartDelay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctStopDelay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctStopTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctTerminateCause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereAcctUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereCalledStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereCallingStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereConnectInfoStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereConnectInfoStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereFramedIPAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereFramedProtocol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereNASIPAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereNASPortId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereNASPortType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereRadAcctId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereRealm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RadAcct whereUserName($value)
 * @mixin \Eloquent
 */
class RadAcct extends Model
{
    public $table = 'radacct';

    public $timestamps = false;

    protected $dates = ['AcctStartTime', 'AcctStopTime'];

    public $fillable = [
        'AcctSessionId',
        'AcctUniqueId',
        'UserName',
        'Realm',
        'NASIPAddress',
        'NASPortId',
        'NASPortType',
        'AcctStartTime',
        'AcctStopTime',
        'AcctSessionTime',
        'AcctAuthentic',
        'ConnectInfo_start',
        'ConnectInfo_stop',
        'AcctInputOctets',
        'AcctOutputOctets',
        'CalledStationId',
        'CallingStationId',
        'AcctTerminateCause',
        'ServiceType',
        'FramedProtocol',
        'FramedIPAddress',
        'AcctStartDelay',
        'AcctStopDelay',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'AcctSessionId'      => 'string',
        'AcctUniqueId'       => 'string',
        'UserName'           => 'string',
        'Realm'              => 'string',
        'NASIPAddress'       => 'string',
        'NASPortId'          => 'string',
        'NASPortType'        => 'string',
        'AcctSessionTime'    => 'integer',
        'AcctAuthentic'      => 'string',
        'ConnectInfo_start'  => 'string',
        'ConnectInfo_stop'   => 'string',
        'CalledStationId'    => 'string',
        'CallingStationId'   => 'string',
        'AcctTerminateCause' => 'string',
        'ServiceType'        => 'string',
        'FramedProtocol'     => 'string',
        'FramedIPAddress'    => 'string',
        'AcctStartDelay'     => 'integer',
        'AcctStopDelay'      => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Convert SQL datetime to Carbon datetime.
     *
     * @param $value
     */
    public function setAcctStartTimeAttribute($value)
    {
        $this->attributes['AcctStartTime'] = Carbon::parse($value);
    }

    /**
     * Convert SQL datetime to Carbon datetime.
     *
     * @param $value
     */
    public function setAcctStopTimeAttribute($value)
    {
        $this->attributes['AcctStopTime'] = Carbon::parse($value);
    }
}
