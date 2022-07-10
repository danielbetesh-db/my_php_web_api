<?php




class RequestJsonInputs extends RequestInputs{
    public function get_inputs()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}

