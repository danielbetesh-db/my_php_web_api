<?php

class JsonRequestValidator extends RequestInputs {

    public function is_valid_inputs($values = [])
    {
        $inputs = $this->get_inputs();
        if(!$inputs){
            return false;
        }else {
            foreach ($values as $v) {
                if ((!isset($inputs[$v]) || !$inputs[$v])) {
                    return false;
                }
            }
        }
        return true;
    }
}

