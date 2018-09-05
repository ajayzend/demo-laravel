<?php

namespace App\Repositories\Backend\Visatype;

use DB;
use Carbon\Carbon;
use App\Models\Visatype\Visatype;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VisatypeRepository.
 */
class VisatypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Visatype::class;

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
                config('module.visatypes.table').'.id',
                config('module.visatypes.table').'.created_at',
                config('module.visatypes.table').'.updated_at',
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
        $visatype = self::MODEL;
        $visatype = new $visatype();
        if ($visatype->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.visatypes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Visatype $visatype
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Visatype $visatype, array $input)
    {
    	if ($visatype->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.visatypes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Visatype $visatype
     * @throws GeneralException
     * @return bool
     */
    public function delete(Visatype $visatype)
    {
        if ($visatype->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.visatypes.delete_error'));
    }
}
