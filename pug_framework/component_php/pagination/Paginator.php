<?php

namespace Pug_Framework\Component_Php\Pagination;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

final class Paginator
{
    use TraitPagination;

    private static $all_option = [];
    private static $select_limit = [];
    private static $select_all = [];
    private static $url = '';
    /**
     * @param string $href
     * @param integer $page_number
     * @param array $select_limit [Query -> SELECT * FROM {table} LIMIT 1, 10] = result;  
     * @param array $select_all [Query -> SELECT * FROM {table}] = result;
     * @return self
     */
    public static function optionSetter(string $href, int $page_number, array $select_limit, array $select_all): self
    {
        $pageSetup = Paginator::pageSetup($page_number);

        self::$url = $href;
        self::$all_option = [
            'page_start' => $pageSetup['page_start'],
            'page_end' => $pageSetup['page_end'],
        ];

        self::$select_limit = $select_limit;
        self::$select_all = $select_all;

        return new self;
    }
    /**
     * @return void
     */
    public function asFooter(): void
    {
        $html = '';
        $total_record = count(self::$select_all);
        $total_page = ceil($total_record / self::$all_option['page_end']);

        $html .= '<nav aria-label="Page navigation example">';
        $html .= '<ul class="pagination justify-content-center">';
        $html .= '<li class="page-item"><a class="page-link" href="' . self::$url . '?page=1">Previous</a></li>';

        for ($i = 1; $i < $total_page; $i++) {
            $html .= '<li class="page-item"><a class="page-link" href="' . self::$url . '?page=' . $i . '">' . $i . '</a></li>';
        }

        $html .= '<li class="page-item"><a class="page-link" href="' . self::$url . '?page=' . $total_page . '">Next</a></li>';
        $html .= '</ul>';
        $html .= '</nav>';

        echo $html;
    }
}



