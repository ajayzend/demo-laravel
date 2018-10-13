<?php

namespace App\Models\Evisacountry;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evisacountry\Traits\EvisacountryAttribute;
use App\Models\Evisacountry\Traits\EvisacountryRelationship;

class Evisacountry extends BaseModel
{
    use ModelTrait,
        EvisacountryAttribute,
    	EvisacountryRelationship {
            // EvisacountryAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'evisacountries';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
'name',
'fee'
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
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
