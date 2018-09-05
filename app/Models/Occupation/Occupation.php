<?php

namespace App\Models\Occupation;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Occupation\Traits\OccupationAttribute;
use App\Models\Occupation\Traits\OccupationRelationship;

class Occupation extends BaseModel
{
    use ModelTrait,
        OccupationAttribute,
    	OccupationRelationship {
            // OccupationAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'occupations';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
'name'
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
