<?php

namespace App\Repositories\Backend\Occupation;

use DB;
use Carbon\Carbon;
use App\Models\Occupation\Occupation;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OccupationRepository.
 */
class OccupationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Occupation::class;

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
                config('module.occupations.table').'.id',
                config('module.occupations.table').'.name',
                config('module.occupations.table').'.created_at',
                config('module.occupations.table').'.updated_at',
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
        $occupation = self::MODEL;
        $occupation = new $occupation();
        if ($occupation->create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.occupations.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Occupation $occupation
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Occupation $occupation, array $input)
    {
    	if ($occupation->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.occupations.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Occupation $occupation
     * @throws GeneralException
     * @return bool
     */
    public function delete(Occupation $occupation)
    {
        if ($occupation->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.occupations.delete_error'));
    }
}
