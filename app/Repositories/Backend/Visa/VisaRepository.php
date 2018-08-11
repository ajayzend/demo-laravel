<?php

namespace App\Repositories\Backend\Visa;

use DB;
use Carbon\Carbon;
use App\Models\Visa\Visa;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VisaRepository.
 */
class VisaRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Visa::class;

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
                config('module.visas.table').'.id',
                config('module.visas.table').'.p1_app_type',
                config('module.visas.table').'.p1_fname',
                config('module.visas.table').'.p1_mname',
                config('module.visas.table').'.p1_lname',
                config('module.visas.table').'.created_at',
                config('module.visas.table').'.updated_at',
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

        /*$visa = self::MODEL;
        $visa = new $visa();
        echo "<pre>";print_r($input);die;
        echo "<pre>";var_dump($visa);
        die;
        if ($visa->save($input)) {
            return true;
        }*/

        if (Visa::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.visas.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Visa $visa
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Visa $visa, array $input)
    {
    	if ($visa->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.visas.update_error'));
    }


    /*
    * Find page by page_slug
    */
    public function findBySlug($visa_slug)
    {
        if (!is_null($this->query()->whereid($visa_slug)->firstOrFail())) {
            return $this->query()->whereid($visa_slug)->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.visas.not_found'));
    }

}
