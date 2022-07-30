<?php

namespace Pug_Framework\Controllers\Foundation;

trait TraitView
{
    private static $file_extension = '.php';
    private static $view_page_index = '../../../index.php';
    private static $path_view = '../../../pug_framework/resource/view/';
    /**
     * @param string $directory_name
     * @param string $file_name
     * @return void
     */
    public static function redirect(string $directory_name, string $file_name): void
    {
        $name_page = $file_name . self::$file_extension;
        $path_result = self::$path_view . $directory_name . '/' . $name_page . '';

        if (file_exists($path_result)) {
            header('location: ' . $path_result . '');
        } else {
            $redirect = self::$file_extension . '?redirect=error';
            header('location: ' . $redirect . '');
        }
    }
}
