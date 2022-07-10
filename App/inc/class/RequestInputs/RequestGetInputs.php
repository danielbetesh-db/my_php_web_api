<?php


class RequestGetInputs extends RequestInputs{

    public function get_inputs(){
        return ['id' => UriGetID::get()];
    }
}
