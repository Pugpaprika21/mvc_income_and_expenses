<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\Foundation;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

class BaseController
{
    use TraitBaseController, TraitView;
}
