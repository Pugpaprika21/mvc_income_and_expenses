<?php

namespace Pug_Framework\Helper_Function\Tool;

final class FileUpload
{
    private $moveTo = '';
    private $newFileName = '';
    private $path_directory = '';
    private $path_default = '';
    private static $file_option = [];
    private static $file_needle = ['name', 'full_path', 'type', 'tmp_name', 'error', 'size'];
    /**
     * @param array 
     * @return self 
     */
    public static function option(array $file_request): self
    {
        $file_request_output = [];
        if (is_array($file_request)) {
            foreach ($file_request as $file_request_key => $file_request_value) {
                // ...
                if (array_key_exists($file_request_key, $file_request) && in_array($file_request[$file_request_key], $file_request)) {
                    $file_request_output[$file_request_key] = $file_request_value;
                    $file_check = $file_request;
                }
            }
            self::$file_option = $file_check;
            return new self;
        }

        self::$file_option;
        return new self;
    }
    /**
     * @param string $path
     * @return object
     */
    public function toDirectory(string $path): object
    {
        $this->path_default = $path;
        $file_name = self::$file_option['name'];
        $imageFileType = pathinfo($file_name, PATHINFO_EXTENSION);
        $merge_typeFile = array_merge(['jpg', 'jpeg', 'png'], ['JPG', 'JPEG', 'PNG']);

        if (in_array($imageFileType, $merge_typeFile)) {

            $nameFile = explode('.', $file_name);
            $imageFileType = $nameFile[1];
            $microsec = round(microtime(true) * 1000);
            $newFileName = $microsec . '.' . $imageFileType;
            $moveTo = $path . $newFileName;

            $this->moveTo = $moveTo;
            $this->path_directory = $path;
            $this->newFileName = $newFileName;
            return $this;
        }

        $this->moveTo = '';
        $this->path_directory = '';
        $this->newFileName = '';
        return $this;
    }
    /**
     * @return string
     */
    public function save(): string
    {
        if (file_exists($this->path_default)) {
            if (move_uploaded_file(self::$file_option['tmp_name'], $this->moveTo)) {
                chmod($this->path_directory . $this->newFileName, 0777);
                return $this->newFileName;
            }
        }

        return 'path not found!';
    }
}
