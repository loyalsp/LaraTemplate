<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 10/2/2017
 * Time: 9:00 PM
 */

namespace Repositories\Eloquent;


class UserDao extends AbstractCommonBehaviors
{
    public function getModel()
    {
        return 'App\User';
    }
}