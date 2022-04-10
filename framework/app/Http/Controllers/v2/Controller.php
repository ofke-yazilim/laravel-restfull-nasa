<?php

namespace App\Http\Controllers\v2;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\OpenApi(
     *   @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST2,
     *      description="Version 2.0.0"
     *   )
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
