<?php


class UriRequestValidator extends Request {

    public function is_valid_uri()
    {

        if (empty(UriController::get()) || empty(UriAction::get())){
            return false;
        }
        if($this->is_get_method() && empty(UriGetID::get())){
            return false;
        }
        return true;
    }
}
