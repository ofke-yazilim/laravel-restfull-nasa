<?php

namespace App\Http\Controllers\v1;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Rover steer service",
     *      description="Rover steer service",
     *      @OA\Contact(
     *          email="omer.faruk.kesmez@gmail.com"
     *      )
     * )
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Version 1.0.0"
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
