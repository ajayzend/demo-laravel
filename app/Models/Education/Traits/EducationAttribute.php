<?php

namespace App\Models\Education\Traits;

/**
 * Class EducationAttribute.
 */
trait EducationAttribute
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
                '.$this->getEditButtonAttribute("edit-education", "admin.education.edit").'
                '.$this->getDeleteButtonAttribute("delete-education", "admin.education.destroy").'
                </div>';
    }
}
