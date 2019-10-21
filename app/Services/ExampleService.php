<?php


namespace App\Services;

use App\Exceptions\ExampleException;
use Illuminate\Support\Facades\Storage;

/**
 * Class ExampleService
 */
class ExampleService
{
    /**
     * @param array $request
     * @return string
     * @throws ExampleException
     */
    public function example1(array $request): string
    {
        if (!isset($request['key'])) {
            throw new ExampleException('key does not exist');
        }

        if ($request['key'] == 'unauthorized') {
            throw new ExampleException('key unauthorized');
        }

        return (string)$request['key'];
    }

    /**
     * @param array $request
     * @return string
     * @throws ExampleException
     */
    public function exampleTextSearch(array $request): string
    {
        if (!isset($request['key'])) {
            throw new ExampleException('key does not exist');
        }

        if ($request['key'] == 'unauthorized') {
            throw new ExampleException('key unauthorized');
        }

        $file = Storage::get('file.txt');
        $fileArray = explode("\n", $file);
        $pattern = '/^'. $request['key'] . ':/';
        $resultArray = preg_grep($pattern, $fileArray);
        return $resultArray;
    }
}
