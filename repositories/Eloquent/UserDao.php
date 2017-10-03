<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 10/2/2017
 * Time: 9:00 PM
 */

namespace App\Repositories\Eloquent;
use App\Repositories\Abs\AbstractCommonBehaviors;

class UserDao extends AbstractCommonBehaviors
{
    public function getModel()
    {
        return 'App\User';
    }
}