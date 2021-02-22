<?php

namespace Support\Http\Middleware;

use Response\Response;

class BaseMiddleware
{
    protected $response;

    /**
     * BaseMiddleware constructor.
     */
    public function __construct()
    {
        $this->response = app(Response::class);
    }
}
