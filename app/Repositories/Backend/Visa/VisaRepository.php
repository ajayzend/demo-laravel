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
            ->leftjoin(config('module.evisacountries.table'), config('module.evisacountries.table').'.id', '=', config('module.visas.table').'.p1_nationality')
            ->select([
                config('module.visas.table') . '.id',
                config('module.visas.table') . '.visa_no',
                config('module.visas.table') . '.p1_app_type',
                config('module.visas.table') . '.p1_visa_type',
                config('module.evisacountries.table') . '.name',
                config('module.visas.table') . '.payment_status',
                config('module.visas.table') . '.india_gov_evisa_status',
                config('module.visas.table') . '.created_at',
                config('module.visas.table') . '.updated_at',
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
        $visa = self::MODEL;
        $visa = new $visa();
        /*$input['visa_no'] = $this->prefixRandomNumber();
        $input['p1_dob'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_dob']));
        $input['p1_edate'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_edate']));*/

        if ($visa->create($input)) {
            return true;
        }
        /*if (Visa::create($input)) {
            return true;
        }*/
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

       /* $input['p1_dob'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_dob']));
        $input['p1_edate'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_edate']));*/
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


    /*
   * Find page by page_slug
   */
    public function findByVisaNoSlug($visa_slug)
    {
        if (!is_null($this->query()->wherevisa_no($visa_slug)->firstOrFail())) {
            return $this->query()->wherevisa_no($visa_slug)->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.visas.not_found'));
    }

    public function prefixRandomNumber(){
        $start = 'IGVR';
        $today = Carbon::today()->toDateString();
        $start .= str_replace('-', '', $today);
        $characters = array_merge(range('A','Z'), range('0','9'));
        for ($i = 0; $i < 8; $i++) {
            $rand = mt_rand(0, count($characters)-1);
            $start .= $characters[$rand];
        }
        return $start;
    }

    public function parseDateValueSpecialChar($date){
        return str_replace('/', '-', $date);
    }
}
