<?php

class Request {
    private $url;
    private $method;
    private $parameters;

    public function __construct($url) {
        $this->url = $url;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->parameters = $this->extractParameters();
    }

    private function extractParameters() {
        if ($this->method === 'POST') {
            return $_POST;
        } else if ($this->method === 'GET') {
            return $_GET;
        }
        return array();
    }

    public function getUrl() {
        return $this->url;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getParameters() {
        return $this->parameters;
    }
}
?>