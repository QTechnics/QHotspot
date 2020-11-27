<?php

namespace App\Repositories;

use App\Models\RadGroupReply;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RadGroupReplyRepository.
 *
 * @version September 28, 2017, 11:03 am UTC
 *
 * @method RadGroupReply findWithoutFail($id, $columns = ['*'])
 * @method RadGroupReply find($id, $columns = ['*'])
 * @method RadGroupReply first($columns = ['*'])
 */
class RadGroupReplyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'GroupName',
        'Attribute',
        'op',
        'Value',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return RadGroupReply::class;
    }
}
