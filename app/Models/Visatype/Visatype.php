<?php

namespace App\Models\Visatype;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visatype\Traits\VisatypeAttribute;
use App\Models\Visatype\Traits\VisatypeRelationship;

class Visatype extends BaseModel
{
    use ModelTrait,
        VisatypeAttribute,
    	VisatypeRelationship {
            // VisatypeAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'visatypes';

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
