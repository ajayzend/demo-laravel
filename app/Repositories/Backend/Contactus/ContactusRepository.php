<?php

namespace App\Repositories\Backend\Contactus;

use DB;
use Carbon\Carbon;
use App\Models\Contactus\Contactus;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactusRepository.
 */
class ContactusRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Contactus::class;

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
                config('module.contactuses.table').'.id',
                config('module.contactuses.table').'.name',
                config('module.contactuses.table').'.mobile',
                config('module.contactuses.table').'.email',
                config('module.contactuses.table').'.query',
                config('module.contactuses.table').'.created_at',
                config('module.contactuses.table').'.updated_at',
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
        $contactus = self::MODEL;
        $contactus = new $contactus();
        if ($contactus->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.contactuses.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Contactus $contactus
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Contactus $contactus, array $input)
    {
    	if ($contactus->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.contactuses.update_error'));
    }

}
