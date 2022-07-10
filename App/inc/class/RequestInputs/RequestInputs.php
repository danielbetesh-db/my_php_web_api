<?php


class RequestInputs extends Request{
    public function get_inputs()
    {
        $obj = null;
        if($this->is_get_method()){
            $obj =  new RequestGetInputs();
        }else{
            $obj =  new RequestJsonInputs();
        }

        return $obj->get_inputs();
    }
}
