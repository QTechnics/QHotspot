<?php

namespace App\Repositories;

use App\Models\RadGroupCheck;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RadGroupCheckRepository
 * @package App\Repositories
 * @version September 28, 2017, 11:03 am UTC
 *
 * @method RadGroupCheck findWithoutFail($id, $columns = ['*'])
 * @method RadGroupCheck find($id, $columns = ['*'])
 * @method RadGroupCheck first($columns = ['*'])
*/
class RadGroupCheckRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'GroupName',
        'Attribute',
        'op',
        'Value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RadGroupCheck::class;
    }
}
