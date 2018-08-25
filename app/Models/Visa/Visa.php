<?php

namespace App\Models\Visa;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visa\Traits\VisaAttribute;
use App\Models\Visa\Traits\VisaRelationship;

class Visa extends Model
{
    use ModelTrait,
        VisaAttribute,
    	VisaRelationship {
            // VisaAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'visa';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'visa_no',
        'p1_app_type',
        'p1_fname',
        'p1_mname',
        'p1_lname',
        'p1_nationality',
        'p1_port_arrival',
        'p1_passport_number',
        'p1_email',
        'p1_phone',
        'p1_visa_type',
        'p1_dob',
        'p1_edate',
        'p2_previous_surname',
        'p2_previous_name',
        'p2_gender',
        'p2_town_city_birth',
        'p2_country_birth',
        'p2_national_id',
        'p2_religion',
        'p2_other_religion',
        'p2_visible_marks',
        'p2_education',
        'p2_other_education',
        'p2_birth_nationality',
        'p2_prev_nationality',
        'p2_lived_visa_country_years',
        'p2_passport_place_issue',
        'p2_passport_date_issue',
        'p2_passport_date_expiry',
        'p2_any_other_valid_passport',
        'p2_other_passport_country',
        'p2_other_passport_number',
        'p2_other_passport_date_issue',
        'p2_other_passport_place_issue',
        'p2_other_nationality_mentioned',
        'process_steps',

    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.visas.table');
    }
}
