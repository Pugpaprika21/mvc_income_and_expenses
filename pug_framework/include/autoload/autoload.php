<?php

namespace Pug_Framework\Include\Autoload;

class Autoloader
{
    /**
     * @var string
     * ทั้ง class เเละ ชื่อไฟล์ ต้องเหมือนกันทั้งหมด
     */
    public static $folder_name = '/mvc_income_and_expenses/'; //<--- config root directory
    public static $get_className = '';
    /**
     * @return void
     */
    public static function register(): void
    {
        spl_autoload_register(function (string $class_name): bool {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
            $root_path = $_SERVER['DOCUMENT_ROOT'] . self::$folder_name . $file;

            if (file_exists($root_path)) {
                include_once $root_path;
                return true;
            }
            return false;
        });
    }
    /**
     * @return void
     */
    /* public static function get_className(): void
    {
        echo __CLASS__;
    } */
}
