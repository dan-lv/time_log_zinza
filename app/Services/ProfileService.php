<?php
namespace App\Services;

class ProfileService
{
    public function getFieldDiff($request, $profile) {
        $fieldDiff = [];
        $fields = array_intersect(array_keys($request), $profile->getFillable());
        
        foreach($fields as $field) {
            if ($profile->$field != $request[$field]) {
                $fieldDiff[] = $field;
            }
        }

        return $fieldDiff;
    }
}
