<?php

namespace App\Repositories;

use App\Models\RadCheck;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RadCheckRepository
 * @package App\Repositories
 * @version October 5, 2017, 10:12 pm UTC
 *
 * @method RadCheck findWithoutFail($id, $columns = ['*'])
 * @method RadCheck find($id, $columns = ['*'])
 * @method RadCheck first($columns = ['*'])
*/
class RadCheckRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'UserName',
        'Attribute',
        'op',
        'Value',
        'TcKimlikNo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RadCheck::class;
    }
}
