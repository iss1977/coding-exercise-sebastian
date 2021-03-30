<?php
namespace app\core;

class Response
{
    private array $body;

    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function setHeader($headerConfig)
    {
        header($headerConfig);
    }

    public function setBody(array $body)
    {
        $this->body = $body;
    }

    public function getBodyAsJson()
    {
        return json_encode($this->body);

    }

}