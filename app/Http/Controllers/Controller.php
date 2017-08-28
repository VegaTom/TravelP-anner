<?php

namespace TravelPlanner\Http\Controllers;

use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
