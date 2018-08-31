<?php

namespace App\Models\Religion\Traits;

/**
 * Class ReligionAttribute.
 */
trait ReligionAttribute
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
                '.$this->getEditButtonAttribute("edit-religion", "admin.religions.edit").'
                '.$this->getDeleteButtonAttribute("delete-religion", "admin.religions.destroy").'
                </div>';
    }
}
