<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Generate drop-down select data with basic IDs.
     *
     * @param null $id
     * @param null $val
     *
     * @return array
     */
    public static function getSelectData($field_name = 'name', $req = 0)
    {
        $collection = parent::all();

        return self::getItems($collection, $field_name, $req);
    }

    /**
     * Generate items for drop-down select data with basic IDs.
     *
     * @param $collection
     *
     * @return array
     */
    public static function getItems($collection, $field_name, $req)
    {
        $items = [];

        foreach ($collection as $model) {
            $items[$model->id] = [
                'id'    => $model->id,
                'name'  => $model->$field_name,
                'model' => $model,
            ];
        }

        foreach ($items as $id => $item) {
            $items[$item['id']] = $item['name'];
        }

        if($req == 1)
            unset($items[0]);
        asort($items);
        return $items;
    }

    /**
     * Generate drop-down select data with basic IDs.
     *
     * @param null $id
     * @param null $val
     *
     * @return array
     */
    public static function getSelectCustomDataVisaFee($field_name = 'name')
    {
        $collection = parent::all();

        return self::getCustomItems($collection, $field_name);
    }

    /**
     * Generate items for drop-down select data with basic IDs.
     *
     * @param $collection
     *
     * @return array
     */
    public static function getCustomItems($collection, $field_name)
    {
        $items = [];

        foreach ($collection as $model) {
            $items[$model->id] = [
                'id'    => $model->id,
                'fee'  => $model->fee,
                'model' => $model,
            ];
        }

        foreach ($items as $id => $item) {
            $items[$item['id']] = $item['fee'];
        }

        return $items;
    }
}
