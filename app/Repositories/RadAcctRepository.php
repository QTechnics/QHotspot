<?php

namespace App\Repositories;

use App\Models\RadAcct;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RadAcctRepository
 * @package App\Repositories
 * @version September 28, 2017, 10:54 am UTC
 *
 * @method RadAcct findWithoutFail($id, $columns = ['*'])
 * @method RadAcct find($id, $columns = ['*'])
 * @method RadAcct first($columns = ['*'])
*/
class RadAcctRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'AcctStopDelay'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RadAcct::class;
    }
}
