<?php

namespace App\Models\Visatype\Traits;

/**
 * Class VisatypeAttribute.
 */
trait VisatypeAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-visatype", "admin.visatypes.edit").'
                '.$this->getDeleteButtonAttribute("delete-visatype", "admin.visatypes.destroy").'
                </div>';
    }
}
