<?php

namespace App\Repositories;

use App\Models\Nas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NasRepository
 * @package App\Repositories
 * @version September 28, 2017, 11:01 am UTC
 *
 * @method Nas findWithoutFail($id, $columns = ['*'])
 * @method Nas find($id, $columns = ['*'])
 * @method Nas first($columns = ['*'])
*/
class NasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nasname',
        'shortname',
        'type',
        'ports',
        'secret',
        'community',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nas::class;
    }
}
