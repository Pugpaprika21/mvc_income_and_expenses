<?php

namespace Pug_Framework\Http\Http_Request;

final class Request
{
    /**
     * @var array
     */
    private static $output_request_all = [];
    /**
     * Request POST
     * @return self
     */
    public static function post(): self
    {
        $post_output = [];
        $post_req = is_array($_POST) ? $_POST : [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ...
            foreach ($post_req as $post_req_key => $post_req_value) {
                // ...
                if (array_key_exists($post_req_key, $post_req)) {
                    $post_output[$post_req_key] = htmlspecialchars($post_req_value);
                }
            }

            self::$output_request_all = $post_output;
            return new self;
        }

        self::$output_request_all = $post_output = ['error' => get_class(new self)];
        return new self;
    }
    /**
     * Request GET
     * @return self
     */
    public static function get(): self
    {
        $get_output = [];
        $get_req = is_array($_GET) ? $_GET : [];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // ...
            foreach ($get_req as $get_req_key => $get_req_value) {
                // ...
                if (array_key_exists($get_req_key, $get_req)) {
                    $get_output[$get_req_key] = htmlspecialchars($get_req_value);
                }
            }

            self::$output_request_all = $get_output;
            return new self;
        }

        self::$output_request_all = $get_output = ['error' => get_class(new self)];
        return new self;
    }
    /**
     * @param string $file_name
     * @return self
     */
    public static function files(string $file_name): self
    {
        $files_output = [];
        $files_req = is_array($_FILES) ? ['files' => $_FILES] : [];

        if (is_string($file_name)) {
            $file_list = $files_req['files'][$file_name];
            foreach ($file_list as $file_list_key =>  $file_list_value) {
                if (array_key_exists($file_list_key, $file_list)) {
                    $files_output[$file_list_key] = htmlspecialchars($file_list_value);
                }
            }
            self::$output_request_all = $files_output;
            return new self;
        }

        self::$output_request_all = $files_output = ['error' => get_class(new self)];
        return new self;
    }
    /**
     * Request all information from system users | POST GET FILES | 
     * @param string $file_name
     * @return self
     */
    public static function any(string $file_name = ''): self
    {
        $post_request_output = [];
        $get_request_output = [];
        $files_request_output = [];

        $post_request = !empty($_POST) ? $_POST : [];
        $get_request = !empty($_GET) ? $_GET : [];
        $files_request = !empty($_FILES) ? ['files_request' => $_FILES] : [];

        foreach ($post_request as $post_request_key => $post_request_value) {
            if (array_key_exists($post_request_key, $post_request)) {
                $post_request_output[$post_request_key] = htmlspecialchars($post_request_value);
            }
        }

        foreach ($get_request as $get_request_key => $get_request_value) {
            if (array_key_exists($get_request_key, $get_request)) {
                $get_request_output[$get_request_key] = htmlspecialchars($get_request_value);
            }
        }

        if ($file_name !== '') {
            $file_names = $files_request['files_request'][$file_name];
            foreach ($file_names as $files_request_key => $files_request_value) {
                if (array_key_exists($files_request_key, $file_names)) {
                    $files_request_output[$files_request_key] = htmlspecialchars($files_request_value);
                }
            }
            
        } else {
            $files_request_output = ['files' => 'Filename not found!'];
        }

        $request_data_all = array_merge($post_request_output, $get_request_output, $files_request_output);

        if (is_array($request_data_all)) {
            self::$output_request_all = $request_data_all;
            return new self;
        }

        self::$output_request_all = $request_data_all;
        return new self;
    }
    /**
     * @return self
     */
    public static function postMultiple(): self
    {
        $postArray = !empty($_POST) ? $_POST : [];
        self::$output_request_all = $postArray;
        return new self;
    } 
    /**
     * @return array
     */
    public function toArray(): array
    {
        $array_result = is_array(self::$output_request_all) ? self::$output_request_all : [
            'status' => http_response_code(500),
            'error' => get_class($this)
        ];

        return $array_result;
    }
    /**
     * @return object
     */
    public function toStdClass(): object
    {
        $json_result = json_decode(json_encode(self::$output_request_all));

        return is_object($json_result) ? $json_result : (object)[
            'status' => http_response_code(500),
            'error' => get_class($this)
        ];
    }
}
