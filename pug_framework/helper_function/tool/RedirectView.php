<?php

namespace Pug_Framework\Helper_Function\Tool;

class RedirectView
{
    private const LOCATION = 'Location:';
    /**
     * @param string $pathLocation
     * @param string $pathName
     * @return void
     */
    public static function action(string $pathLocation, string $pathName): void
    {
        $subStr = substr($pathName, 0, -9);

        if (file_exists($pathLocation)) {
            header(self::LOCATION . $pathName . 'php');
        } else {
            header(self::LOCATION . $pathName . 'php');
        }
    }
}

RedirectView::action('', '');
