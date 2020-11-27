<?php

namespace App\Repositories;

use App\Models\RadReply;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RadReplyRepository.
 *
 * @version September 28, 2017, 11:16 am UTC
 *
 * @method RadReply findWithoutFail($id, $columns = ['*'])
 * @method RadReply find($id, $columns = ['*'])
 * @method RadReply first($columns = ['*'])
 */
class RadReplyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'UserName',
        'Attribute',
        'op',
        'Value',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return RadReply::class;
    }
}
