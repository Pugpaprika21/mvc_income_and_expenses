<?php

namespace Pug_Framework\Component_Php\Pagination;

trait TraitPagination
{
    /**
     * @param integer $page_number
     * @return array
     */
    public static function pageSetup(int $page_number): array
    {
        $start = 0;
        $perpage = 0;

        if ($page_number > 0) {
            $perpage = $page_number; //10
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $start = ($page - 1) * $perpage;

            return [
                'page_start' => $start,
                'page_end' => $perpage
            ];
        }

        return [
            'page_start' => $start,
            'page_end' => $perpage
        ];
    }
}
