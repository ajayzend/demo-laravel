<?php

namespace App\Repositories\Frontend\Visa;

use DB;
use Carbon\Carbon;
use App\Models\Visa\Visa;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
     * Visa Profile Photo Path.
     *
     * @var string
     */
    protected $visa_profile_path;

    /**
     * Visa Passport Photo Path.
     *
     * @var string
     */
    protected $visa_passport_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->visa_profile_path = 'img'.DIRECTORY_SEPARATOR.'visaprofile'.DIRECTORY_SEPARATOR;
        $this->visa_passport_path = 'img'.DIRECTORY_SEPARATOR.'visapassport'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

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
        $visa = self::MODEL;
        $visa = new $visa();
        $input['visa_no'] = $this->prefixRandomNumber();
        $input['p1_dob'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_dob']));
        $input['p1_edate'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_edate']));
        $res = $visa->create($input);
        if ($res) {
                return $res;
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
        $process_steps = session()->get('process_steps');
        if($process_steps == 10001 || $process_steps == ''){
            $input['p1_dob'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_dob']));
            $input['p1_edate'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p1_edate']));
        }else if($process_steps == 10002){
            $input['p2_passport_date_issue'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p2_passport_date_issue']));
            $input['p2_passport_date_expiry'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p2_passport_date_expiry']));
            if($input['p2_any_other_valid_passport'] == 1)
                $input['p2_other_passport_date_issue'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p2_other_passport_date_issue']));
        }

        else if($process_steps == 10003){
            /*$input['p2_passport_date_issue'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p2_passport_date_issue']));
            $input['p2_passport_date_expiry'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p2_passport_date_expiry']));
            if($input['p2_any_other_valid_passport'] == 1)
                $input['p2_other_passport_date_issue'] = Carbon::parse($this->parseDateValueSpecialChar( $input['p2_other_passport_date_issue']));*/
        }

        else if($process_steps == 10004){
            if (!empty($input['p4_date_issue'])) {
                $input['p4_date_issue'] = Carbon::parse($this->parseDateValueSpecialChar($input['p4_date_issue']));
            }
            if (!empty($input['p4_photo_name'])) {
                $this->removeImage($visa, 'profile');

                $input['p4_photo_name'] = $this->uploadImage($visa, $input['p4_photo_name'], 'profile');
            }
        }

        else if($process_steps == 10005){
            if (!empty($input['p5_passport_photo_name'])) {
                $this->removeImage($visa, 'passport');

                $input['p5_passport_photo_name'] = $this->uploadImage($visa, $input['p5_passport_photo_name'], 'passport');
            }
        }

    	if ($visa->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.visas.update_error'));
    }

    /*
    * Upload logo image
    */
    public function uploadImage($setting, $logo, $type)
    {
        if ($type == 'profile')
            $path = $this->visa_profile_path;
        elseif ($type == 'passport')
            $path = $this->visa_passport_path;

        $image_name = time() . $logo->getClientOriginalName();

        $this->storage->put($path . $image_name, file_get_contents($logo->getRealPath()));

        return $image_name;
    }

    /*
        * remove logo or favicon icon
        */
    public function removeImage(Visa $visa, $type)
    {
        if ($type == 'profile')
            $path = $this->visa_profile_path;
        elseif ($type == 'passport')
            $path = $this->visa_passport_path;

        if ($visa->$type && $this->storage->exists($path.$visa->$type)) {
            $this->storage->delete($path.$visa->$type);
        }

        $result = $visa->update([$type => null]);

        if ($result) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
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
        if (!is_null($this->query()->wherevisa_no($visa_slug)->first())) {
            return $this->query()->wherevisa_no($visa_slug)->firstOrFail();
        }
        return false;
        //throw new GeneralException(trans('exceptions.backend.access.visas.not_found'));
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
