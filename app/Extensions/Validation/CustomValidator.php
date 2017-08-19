<?php

namespace TravelPlanner\Extensions\Validation;

use Hash;
use Request;
use TravelPlanner\Models\User;

class CustomValidator
{
    /**
     *  Find User by given email
     *  @param $email:      User email
     *  @param $queryAddon: Closure to add to query
     *  @return  mixed
     */
    protected function findUserByEmail($email, $closure = null)
    {
        return User::where('email', $email)
            ->when(!empty($closure), function ($q) use ($closure) {
                return $closure($q);
            })->first();
    }

    /**
     *  Checks if password provided is same as actual
     *  @param $attribute:      field under validation
     *  @param $value:          incomming value
     *  @return  boolean
     */
    public function validateActualPassword($attribute, $value, $parameters, $validator)
    {
        return Hash::check($value, Request::user()->password);
    }

    /**
     *  Checks if user has no active password recovery request
     *  @param $attribute:      field under validation
     *  @param $value:          incomming value (email)
     *  @return  boolean
     */
    public function validateHasNoRecoveryRequest($attribute, $value, $parameters, $validator)
    {
        return empty($this->findUserByEmail($value)->password_recovery_token);
    }

}
