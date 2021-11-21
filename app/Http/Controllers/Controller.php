<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\Info(
 *     version="1.0",
 *     title="Green Shop Api Documentaion By Swagger",
 *     description="Green Shop Service Api Documentation (BehAndam Admin Services)",
 *     @OA\Contact(
 *         email="saber.tabatabaee@gmail.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *
 * @OA\Server(
 *      url="https://beitak.ir",
 *      description="LOCAL API Server"
 * )
 *
 * @OA\Server(
 *      url="http://localhost:8000",
 *      description="LOCAL API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     name="BearerAuth",
 *     type="http",
 *     description="Use username & password for token",
 *     securityScheme="bearer",
 *     scheme="bearer",
 * )
 *
 * @OA\Tag(
 *     name="Green Shop Service",
 *     description="API Endpoints of Green Shop Service"
 * )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
