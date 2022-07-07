<?php


class BaseController
{
    /**
     * __call magic method.
     */
    public function __call($name, $arguments)
    {
        $this->sendOutput(
            new ResponseError(
                false,
                'Unknown method __call',
                ['name' => $name, 'args' => $arguments]
            )
        );
    }

    /**
     * Get URI elements.
     *
     * @return array
     */
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );

        return $uri;
    }

    /**
     * Get querystring params.
     *
     * @return array
     */
    protected function getQueryStringParams()
    {
        return parse_str($_SERVER['QUERY_STRING'], $query);
    }


    /**
     * Validate post values
     *
     * @param array $values
     * @return  boolean
     */
    protected function validateJsonValues($values){
        $input = file_get_contents('php://input');
        $array = json_decode($input, true);
        foreach ($values as $v){
            if ((!isset($array[$v]) || !$array[$v])) {
                $this->sendOutput(
                    new ResponseError(
                        false,
                        'JSON validation error',
                        ['json' => json_decode($input), 'json_decode_assoc' => $array, 'expected_values' => $values]
                    )
                );
            }
        }
        return $array;
    }

    /**
     * Get Api Input
     *
     * @param $method - controller method name
     * @param $inputs - The parameters you expect to get
     * @param $callback - model callback method
     */
    protected function request($method, $inputs, $callback){
        $strErrorDesc = '';
        $requestMethod = strtoupper($_SERVER["REQUEST_METHOD"]);

        if ($requestMethod == $method) {
            try {
                $responseData = call_user_func($callback, $this->validateJsonValues($inputs));

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        // send output
        if (!$strErrorDesc) {
            $this->sendOutput($responseData);
        } else {
            $this->sendOutput(
                new ResponseError(
                    false,
                    $strErrorDesc,
                    [
                        'validationMethod' => $method,
                        'requestedMethod' => $requestMethod,
                        'inputs' => $inputs,
                        'callback' => $callback

                    ],
                    ['Content-Type: application/json', $strErrorHeader]
                )
            );
        }
    }


    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput(IResponse $data)
    {
        header_remove('Set-Cookie');

        $httpHeaders = $data->get_headers();
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }

        echo $data->result();

        exit;
    }
}