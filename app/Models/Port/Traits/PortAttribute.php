<?php

namespace App\Models\Port\Traits;

/**
 * Class PortAttribute.
 */
trait PortAttribute
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
                '.$this->getEditButtonAttribute("edit-port", "admin.ports.edit").'
                '.$this->getDeleteButtonAttribute("delete-port", "admin.ports.destroy").'
                </div>';
    }
}
