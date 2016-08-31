<?php

/**
 * Created by PhpStorm.
 * User: Artush
 * Date: 30.08.2016
 * Time: 22:16
 */
namespace App\Libraries;

class StripTag
{
    /*
	 * Method to strip tags globally.
	 */
    public static function globalXssClean($request)
    {
        $sanitized = static::arrayStripTags($request->all());
        $request->merge($sanitized);
    }

    public static function arrayStripTags($array)
    {
        $result = array();

        foreach ($array as $key => $value) {

            $key = htmlentities($key);

            if (is_array($value)) {

                $result[$key] = static::arrayStripTags($value);

            } else {

                $result[$key] = trim(htmlentities($value));
            }
        }

        return $result;
    }
}