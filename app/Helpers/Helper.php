<?php


if (! function_exists('ellipsis')) {
    function ellipsis($string){
        return str_limit($string, 80);
    }
}

// if (! function_exists('displayMoneyFormat')) {
//     function displayMoneyFormat($money){
//       return number_format(($money / 100), 2);
//     }
// }


// if (! function_exists('dbMoneyFormat')) {
//     function dbMoneyFormat($money){
//         return ($money * 100);
//     }
// }

if (! function_exists('flash')) {
    function flash($title = null, $message = null){
        $flash = app('App\Http\Flash');

        if(func_num_args() == 0){
            return $flash;
        }

        return $flash->info($title, $message);
    }
}
