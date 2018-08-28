<?php

namespace App\Repositories\Backend\Evisacountry;

use DB;
use Carbon\Carbon;
use App\Models\Evisacountry\Evisacountry;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvisacountryRepository.
 */
class EvisacountryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Evisacountry::class;

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
                config('module.evisacountries.table').'.id',
                config('module.evisacountries.table').'.name',
                config('module.evisacountries.table').'.created_at',
                config('module.evisacountries.table').'.updated_at',
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
        $evisacountry = self::MODEL;
        $evisacountry = new $evisacountry();
        if ($evisacountry->create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.evisacountries.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Evisacountry $evisacountry
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Evisacountry $evisacountry, array $input)
    {
    	if ($evisacountry->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.evisacountries.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Evisacountry $evisacountry
     * @throws GeneralException
     * @return bool
     */
    public function delete(Evisacountry $evisacountry)
    {
        if ($evisacountry->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.evisacountries.delete_error'));
    }
}
