<?php

declare(strict_types=1);

namespace Pug_Framework\Helper_Function\Tool;

final class CreateUrl
{
    private static $json_result_path = null;
    private const STATUS_PATH_FIND  = 200;
    private const STATUS_PATH_NOT_FOUND = 500;
    private const MEASSGE_PATH_NOT_FOUND = 'path not found!';
    public const DEFAULT_INDEX_PAGE_PHP = '../../../index.php';
    /**
     * @param string $path_url 
     * @return self
     */
    public static function display_path(string $path_url): self
    {
        if (file_exists($path_url)) {

            self::$json_result_path = json_encode([
                'status' => self::STATUS_PATH_FIND, 
                'path_url' => $path_url
            ]);

            return new self;

        } else {

            self::$json_result_path = json_encode([
                'status' => self::STATUS_PATH_NOT_FOUND, 
                'path_error' => self::MEASSGE_PATH_NOT_FOUND, 
                'path_url' => $path_url
            ]);

            return new self;
        }

        return new self;
    }
    /**
     * @param array $query_string needle [associative array]
     * @return void
     */
    public function withQueryString(array $query_string = []): void
    {
        $js_decode = json_decode(self::$json_result_path);
        if ($js_decode->status == 200) {

            if (count($query_string) !== 0) {
                $http_query = http_build_query($query_string);
                echo json_encode(['path_url' => $js_decode->path_url . '?' . $http_query]);
            } else {
                echo json_encode(['path_url' => $js_decode->path_url]);
            }
        } else {
            echo self::$json_result_path;
        }
    }
}
