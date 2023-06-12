<?php 

namespace GaryClarke\Framework\Http;

class Request 
{
    //rean only -> they get set, but then they can't be changed afterwards and also means that we won't actually need to set them to private and add a lot of Getters and Setters 
    public function __construct(
        // $_GET,$_POST,$_COOKIE,$_FILES,$_SERVER
        public readonly array $getParams,
        public readonly array $postParams,
        public readonly array $cookies,
        public readonly array $files,
        public readonly array $server
    )
    {

    }

    public static function createFromGlobals(): static // static -> returns an instance of itself
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public function getPathInfo(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}