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
        'p2_changed_your_name',
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
        'p3_house_street',
        'p3_village_town',
        'p3_state',
        'p3_pincode',
        'p3_country',
        'p3_phone',
        'p3_mobile',
        'p3_copy_address',
        'p3_house_street2',
        'p3_village_town2',
        'p3_state2',
        'p3_f_name',
        'p3_f_nationality',
        'p3_f_prev_nationality',
        'p3_f_place_birth',
        'p3_f_country_birth',
        'p3_m_name',
        'p3_m_nationality',
        'p3_m_prev_nationality',
        'p3_m_place_birth',
        'p3_m_country_birth',
        'p3_marital_status',
        'p3_s_name',
        'p3_s_nationality',
        'p3_s_prev_nationality',
        'p3_s_place_birth',
        'p3_s_country_birth',
        'p3_flag1',
        'p3_flag1_detail',
        'p3_current_occupation',
        'p3_other_occupation',
        'p3_employer',
        'p3_desination',
        'p3_address',
        'p3_po_phone',
        'p3_past_occupation',
        'p3_other_past_occupation',
        'p3_flag2',
        'p3_other_organization',
        'p3_other_desination',
        'p3_other_rank',
        'p3_other_place_posting',
        'p4_visa_duration',
        'p4_number_entries',
        'p4_expected_port_exit',
        'p4_place_likely_visit',
        'p4_visit_india_before',
        'p4_address1',
        'p4_address2',
        'p4_address3',
        'p4_city_prev_visit',
        'p4_last_curr_visa_no',
        'p4_type_visa',
        'p4_place_issue',
        'p4_date_issue',
        'p4_permission_visit',
        'p4_permission_visit_details',
        'p4_country_visited_last_10_y',
        'p4_saarc_countries_flag',
        'p4_saarc_country_year_visit',
        'p4_r_name',
        'p4_r_address',
        'p4_r_city',
        'p4_r_state',
        'p4_r_country',
        'p4_r_pincode',
        'p4_r_phone',
        'p4_r_h_name',
        'p4_r_h_address1',
        'p4_r_h_address2',
        'p4_r_h_phone',
        'p4_photo_name',
        'p4_photo_name_path',
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
