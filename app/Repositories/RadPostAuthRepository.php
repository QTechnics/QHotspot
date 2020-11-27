<?php

namespace App\Repositories;

use App\Models\RadPostAuth;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RadPostAuthRepository.
 *
 * @version September 28, 2017, 11:16 am UTC
 *
 * @method RadPostAuth findWithoutFail($id, $columns = ['*'])
 * @method RadPostAuth find($id, $columns = ['*'])
 * @method RadPostAuth first($columns = ['*'])
 */
class RadPostAuthRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user',
        'pass',
        'reply',
        'date',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return RadPostAuth::class;
    }
}
