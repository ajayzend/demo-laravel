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
        'app_type',
        'fname',
        'mname',
        'lname',
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
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'app_type',
        'fname',
        'mname',
        'lname',
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
