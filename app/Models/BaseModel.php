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
        $req_filename =  str_replace('\\', '_', get_called_class());
        $json_filename =  $req_filename.$req.'.txt';
        //Retrieve the data from our text file.
        if(file_exists('Masters/'.$json_filename)) {
            $fileContents = file_get_contents('Masters/' . $json_filename);
            if ($fileContents) {
                //Convert the JSON string back into an array.
                $decoded = json_decode($fileContents, true);
                //The end result.
                return $decoded;
            }
        }

        $collection = parent::all();
        return self::getItems($collection, $field_name, $req, $json_filename);
    }

    /**
     * Generate items for drop-down select data with basic IDs.
     *
     * @param $collection
     *
     * @return array
     */
    public static function getItems($collection, $field_name, $req, $json_filename)
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

        //dd($items);
        if($req == 1) {
            unset($items[0]);
            sort($items);
        }else{
            asort($items);
        }

        //Encode the array into a JSON string.
        $encodedString = json_encode($items);
//Save the JSON string to a text file.
        file_put_contents('Masters/'.$json_filename, $encodedString);
        
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
