<?php


class BaseController
{
    protected $request;
    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    /**
     * __call magic method.
     */
    public function __call($name, $arguments)
    {
        Response::error('Unknown method __call', ['name' => $name, 'args' => $arguments])->send_output();
    }

    /**
     * Get Api Input
     *
     */
    protected function request($method_validation, $inputs_validation, BaseModel $model){

        if ($this->request->method() == $method_validation && $this->request->is_valid_inputs($inputs_validation)) {

            try {
                $model->action(UriAction::get(), $this->request->get_inputs())->send_output();
            } catch (Error $e) {

                Response::error($e->getMessage(), [$e],['HTTP/1.1 500 Internal Server Error'])->send_output();
            }
        } else {
            Response::error('Method not supported', [], ['HTTP/1.1 422 Unprocessable Entity'])->send_output();
        }
    }

}