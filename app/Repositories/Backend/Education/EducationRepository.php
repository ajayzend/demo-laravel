<?php

namespace App\Repositories\Backend\Education;

use DB;
use Carbon\Carbon;
use App\Models\Education\Education;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationRepository.
 */
class EducationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Education::class;

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
                config('module.education.table').'.id',
                config('module.education.table').'.created_at',
                config('module.education.table').'.updated_at',
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
        $education = self::MODEL;
        $education = new $education();
        if ($education->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.education.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Education $education
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Education $education, array $input)
    {
    	if ($education->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.education.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Education $education
     * @throws GeneralException
     * @return bool
     */
    public function delete(Education $education)
    {
        if ($education->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.education.delete_error'));
    }
}
