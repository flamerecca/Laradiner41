<?php

namespace App\Http\Controllers;

use App\Services\ExampleService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

/**
 * Class ExampleController
 */
class ExampleController extends Controller
{
    /**
     * @var ExampleService
     */
    private $exampleService;

    /**
     * ExampleController constructor.
     * @param ExampleService $exampleService
     */
    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    /**
     * @param Request $request
     */
    public function example1(Request $request)
    {
        try {
            $this->exampleService->example1($request->all());
        } catch (Exception $exception){
            response()->json([
                'error'   => true,
                'message' => $exception->getMessage()
            ], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @param Request $request
     */
    public function exampleTextSearch(Request $request)
    {
        try {
            $this->exampleService->exampleTextSearch($request->all());
        } catch (Exception $exception){
            response()->json([
                'error'   => true,
                'message' => $exception->getMessage()
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
