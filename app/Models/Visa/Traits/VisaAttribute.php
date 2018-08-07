<?php

namespace App\Models\Visa\Traits;

/**
 * Class VisaAttribute.
 */
trait VisaAttribute
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
                '.$this->getEditButtonAttribute("edit-visa", "admin.visas.edit").'
                '.$this->getDeleteButtonAttribute("delete-visa", "admin.visas.destroy").'
                </div>';
    }
}
