<?php

namespace iutnc\mf\utils;

class HttpRequest extends AbstractHttpRequest
{
    public function __construct()
    {
        $this->script_name = $_SERVER['SCRIPT_NAME'];
        if (isset($_SERVER['PATH_INFO'])) {
            $this->path_info = $_SERVER['PATH_INFO'];
        } else
            $this->path_info = null;
        $this->root = dirname($_SERVER['SCRIPT_NAME']);
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $this->method = $_SERVER['REQUEST_METHOD'];
        } else $this->method = null;
        $this->get = $_GET;
        $this->post = $_POST;
    }
}
