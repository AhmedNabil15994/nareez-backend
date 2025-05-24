<?php

use Carbon\Carbon;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Route;

// Get Setting Values
if (!function_exists('setting')) {
    function setting($key, $index = null)
    {
        $value = null;
        $setting = Valuestore::make(storage_path('app/settings.json'));
        $themeSetting = Valuestore::make(module_path('DeveloperTools', 'site_colors.json'));
        if (($value = data_get($setting->get($key), $index)) != null) {
            return $value;
        }
        if (($value = data_get($themeSetting->get($key), $index)) != null) {
            return $value;
        }
        return $value;
    }
}

if (!function_exists('generate_signature')) {
    function generate_signature($api_key, $api_secret, $meeting_number, $role)
    {
        date_default_timezone_set("UTC");
        $time = time() * 1000 - 30000; //time in milliseconds (or close enough)
        $data = base64_encode($api_key . $meeting_number . $time . $role);
        $hash = hash_hmac('sha256', $data, $api_secret, true);
        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }
}
if (!function_exists('color_theme')) {
    function color_theme($category)
    {
        return $category ? $category->color : '';
    }
}

if (!function_exists('active_slide_menu')) {
    function active_slide_menu($routeNames)
    {
        $response = [];
        foreach ((array)$routeNames as $name) {
            array_push($response, active_menu($name));
        }

        return in_array('active', $response) ? 'active open' : '';
    }
}

// Active Dashboard Menu
if (!function_exists('active_menu')) {
    function active_menu($routeNames)
    {
        $routeNames = (array) $routeNames;
        return in_array(request()->segment(3), $routeNames) ? 'active' : '';
    }
}


// Active Dashboard Menu
if (!function_exists('array_pluck')) {
    function array_pluck($object, $index)
    {
        return $object->pluck($index)->toArray();
    }
}

if (!function_exists('active_profile')) {
    function active_profile($route)
    {
        return (Route::currentRouteName() == $route) ? 'active' : '';
    }
}


if (!function_exists('setValidationAttributes')) {
    function setValidationAttributes(array $attributes, $local = 'ar')
    {
        if (config('core.validation-attributes.' . $local)) {
            $attributes += (array)config('core.validation-attributes.' . $local);
            Illuminate\Support\Facades\Config::set('core.validation-attributes.' . $local, $attributes);
        }
    }
}
// GET THE CURRENT LOCALE
if (!function_exists('locale')) {
    function locale()
    {
        return app()->getLocale();
    }
}

// CHECK IF CURRENT LOCALE IS RTL
if (!function_exists('is_rtl')) {
    function is_rtl($locale = null)
    {
        $locale = ($locale == null) ? locale() : $locale;

        if (in_array($locale, config('rtl_locales'))) {
            return 'rtl';
        }

        return 'ltr';
    }
}


if (!function_exists('slugFy')) {
    /**
     * @param $string
     * @param $model
     * @param $locale
     * @param null $targetObjectID
     * @param string $column
     * @param string $separator
     * @return array|string|string[]
     */
    function slugFy($string, $model, $locale, $targetObjectID = null, $column = 'slug', $separator = '-')
    {
        $url = trim($string);
        $url = strtolower($url);
        $url = preg_replace('|[^a-z-A-Z\p{Arabic}0-9 _]|iu', '', $url);
        $url = preg_replace('/\s+/', ' ', $url);
        $url = str_replace(' ', $separator, $url);

        if (slugQuery($url, $model, $locale, $targetObjectID, $column)) {
            $counter = 1;

            while (true) {
                if (!slugQuery($url . $separator . $counter, $model, $locale, $targetObjectID, $column)) {
                    return $url . $separator . $counter;
                }

                $counter++;
            }
        }

        return $url;
    }
}

if (!function_exists('slugQuery')) {
    /**
     * @param $string
     * @param $model
     * @param $locale
     * @param null $targetObjectID
     * @param string $column
     * @return mixed
     */
    function slugQuery($string, $model, $locale, $targetObjectID = null, $column = 'slug')
    {
        return $model->where(function ($q) use ($targetObjectID, $string, $column, $locale) {
            if ($targetObjectID) {
                $q->where('id', '!=', $targetObjectID);
            }

            $q->where($column . '->' . $locale, $string);
        })->first();
    }
}


// if (! function_exists('path_without_domain')) {
//     /**
//      * Get Path Of File Without Domain URL
//      *
//      * @param string $locale
//      */
//     function path_without_domain($path)
//     {
//         return parse_url($path, PHP_URL_PATH);
//     }
// }


if (!function_exists('path_without_domain')) {
    /**
     * Get Path Of File Without Domain URL
     *
     * @param string $locale
     */
    function path_without_domain($path)
    {
        $url = $path;
        $parts = explode("/", $url);
        array_shift($parts);
        array_shift($parts);
        array_shift($parts);
        $newUrl = implode("/", $parts);

        return $newUrl;
    }
}

if (!function_exists('int_to_array')) {
    /**
     * convert a comma separated string of numbers to an array
     *
     * @param string $integers
     */
    function int_to_array($integers)
    {
        return array_map("intval", explode(",", $integers));
    }
}


if (!function_exists('combinations')) {
    function combinations($arrays, $i = 0)
    {
        if (!isset($arrays[$i])) {
            return array();
        }

        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }

        // get combinations from subsequent arrays
        $tmp = combinations($arrays, $i + 1);

        $result = array();

        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ?
                    array_merge(array($v), $t) :
                    array($v, $t);
            }
        }

        return $result;
    }
}


if (!function_exists('htmlView')) {
    /**
     * Access the OrderStatus helper.
     */
    function htmlView($content)
    {
        return
            '<!DOCTYPE html>
           <html lang="en">
             <head>
               <meta charset="utf-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <link href="css/bootstrap.min.css" rel="stylesheet">
               <!--[if lt IE 9]>
                 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
               <![endif]-->
             </head>
             <body>
               ' . $content . '
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
               <script src="js/bootstrap.min.js"></script>
             </body>
           </html>';
    }
}


if (!function_exists('currency')) {
    /**
     * The Current currency
     *
     * @param string $currency
     */
    function currency($price)
    {
        if (session()->get('currency')) {
            return convertCurrency($price) . ' ' . currentCurrency();
        }

        return convertCurrency($price) . ' ' . currentCurrency();
    }
}

if (!function_exists('convertCurrency')) {
    /**
     * The Convert Price
     *
     * @param string $price
     */
    function convertCurrency($price)
    {
        if (session()->get('currency')) {
            return (round(($price * session()->get('currency')['rate']) / 5) * 5);
        }

        if (request()->header('Currency-Rate')) {
            return (round(($price * request()->header('Currency-Rate')) / 5) * 5);
        }

        return round($price);
    }
}

if (!function_exists('currentCurrency')) {
    /**
     * The Current currentCurrency
     *
     * @param string $currentCurrency
     */
    function currentCurrency()
    {
        if (session()->get('currency')) {
            return session()->get('currency')['code'];
        }

        if (request()->header('Currency-Rate')) {
            return request()->header('Currency-Code');
        }

        return setting('default_currency');
    }
}



if (!function_exists('getDays')) {
    function getDays($dayCode = null)
    {
        $daysArray = [
            1  => __('course::dashboard.courses.days.sun'),
            2  => __('course::dashboard.courses.days.mon'),
            3  => __('course::dashboard.courses.days.tue'),
            4  => __('course::dashboard.courses.days.wed'),
            5  => __('course::dashboard.courses.days.thu'),
            6  => __('course::dashboard.courses.days.fri'),
            7  => __('course::dashboard.courses.days.sat'),
        ];
        if ($dayCode == null) {
            return $daysArray;
        }
        $day = $daysArray[$dayCode];
        return $day;
    }
}
if (!function_exists('getDayNumberForZoom')) {
    function getDayNumberForZoom($dayCode = null)
    {
        $day =
            [
                'sun'   => 1,
                'mon'   => 2,
                'tue'   => 3,
                'wed'   => 4,
                'thu'   => 5,
                'fri'   => 6,
                'sat'   => 7,
            ];
        return $day[$dayCode];
    }
}
if (!function_exists('weekDaysBetween')) {
    function weekDaysBetween($course)
    {
        $requiredDays = str_split($course->extra_attributes->get('days'));

        $start = $course->extra_attributes->get('start_date');

        $end = $course->extra_attributes->get('end_date');

        $startTime = Carbon::parse($start);
        $endTime   = Carbon::parse($end);
        $result = [];
        while ($startTime->lt($endTime)) {
            if (in_array($startTime->dayOfWeek + 1, $requiredDays)) {
                $event = createEventCalender($course, $startTime->copy());
                array_push($result, $event);
            }
            $startTime->addDay();
        }
        return $result;
    }
}

if (!function_exists('createEventCalender')) {
    function createEventCalender($course, $startTime)
    {
        return [
            'title' => $course->title,
            'start' => $startTime,
            'end' => $startTime->addMinutes($course->extra_attributes->get('duration')),
            "allDay" => false,
            "className" => ['id' => $course->id, 'trainer' => $course->trainer->name]
        ];
    }
}





if (!function_exists('slugAr')) {
    /**
     * The Current dir
     *
     * @param  string  $locale
     */
    function slugAr($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }
        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);
        // Lower case everything
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: https://www.php.net/manual/en/function.mb-strtolower.php
        $string = mb_strtolower($string, "UTF-8");;
        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
        $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }
}



if (!function_exists('checkRouteLocale')) {
    function checkRouteLocale($model, $slug)
    {
        if ($array = $model->getTranslations("slug")) {
            $locale = array_search($slug, $array);
            return $locale == locale();
        }
        return true;
    }
}
