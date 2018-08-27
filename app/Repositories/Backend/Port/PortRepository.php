<?php

namespace App\Repositories\Backend\Port;

use DB;
use Carbon\Carbon;
use App\Models\Port\Port;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PortRepository.
 */
class PortRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Port::class;

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
                config('module.ports.table').'.id',
                config('module.ports.table').'.name',
                config('module.ports.table').'.created_at',
                config('module.ports.table').'.updated_at',
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
        $port = self::MODEL;
        $port = new $port();
        if ($port->create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.ports.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Port $port
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Port $port, array $input)
    {
    	if ($port->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.ports.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Port $port
     * @throws GeneralException
     * @return bool
     */
    public function delete(Port $port)
    {
        if ($port->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.ports.delete_error'));
    }
}
