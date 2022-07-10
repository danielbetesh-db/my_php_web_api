<?php






class Request extends BaseRequest {

    public function get_inputs(){
        return RequestInputs::get_instance()->get_inputs();
    }

    public function is_valid_uri(){
        return UriRequestValidator::get_instance()->is_valid_uri();
    }

    public function is_valid_inputs($values)
    {
        return JsonRequestValidator::get_instance()->is_valid_inputs($values);
    }

    public function method(){
        return strtoupper($_SERVER["REQUEST_METHOD"]);
    }

    public function is_get_method(){
        return $this->method() == "GET";
    }


}







