<?php

namespace App\Helpers;

class Logger{

    protected $file;

    /**
     * Default logger only supports logging into files, fancy stuff: get a real logger
     * @param $file
     */
    public function __construct($file){
        $this->setFile($file);
    }


    private function write($content, $type){
        return file_put_contents(
            $this->getFile(),
            file_get_contents(
                $this->getFile()
            )."\n".date('d/m/y H:i:s').' - '.
            '['.$type.'] :: '.$content
        );

    }



    public function log($content){
        $this->write($content, 'log');
    }

    public function error($content){
        $this->write($content, 'error');
    }
    public function debug($content){
        $this->write($content, 'debug');
    }
    public function warning($content){
        $this->write($content, 'warning');
    }


    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


}

