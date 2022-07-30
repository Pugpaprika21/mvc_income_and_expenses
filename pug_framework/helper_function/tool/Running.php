<?php

namespace Pug_Framework\Helper_Function\Tool;

final class Running
{
    private static $array_output = [];
    
    public static function numbers($option): self
    {
        if (is_array($option) || is_object($option)) {
            
        }

        return new self;
    }

    public function getResult(): string
    {
        return '';
    }
}
