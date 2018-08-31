<?php

namespace App\Repositories\Backend\Religion;

use DB;
use Carbon\Carbon;
use App\Models\Religion\Religion;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReligionRepository.
 */
class ReligionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Religion::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.religions.table').'.id',
                config('module.religions.table').'.created_at',
                config('module.religions.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        $religion = self::MODEL;
        $religion = new $religion();
        if ($religion->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.religions.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Religion $religion
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Religion $religion, array $input)
    {
    	if ($religion->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.religions.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Religion $religion
     * @throws GeneralException
     * @return bool
     */
    public function delete(Religion $religion)
    {
        if ($religion->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.religions.delete_error'));
    }
}
