<?php

namespace App\Http\Controllers\api;

class Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel WAD API",
     *      description="L5 SwaggerLaravel WAD API Documentation",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="WAD API Server"
     * )

     *
     * @OA\Tag(
     *     name="WAD",
     *     description="API Endpoints of wad laravel Api"
     * )
     * 
     *  * @OA\SecurityScheme(
     *    securityScheme="bearerAuth",
     *    in="header",
     *    name="bearerAuth",
     *    type="http",
     *    scheme="bearer",
     *    bearerFormat="JWT",
     *    description="Add token value without Bearer. will append automaticaly"
     * ),
     */
}