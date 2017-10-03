<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 10/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\Controllers;


use App\Repositories\Eloquent\UserDao;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
private $userDao;
    /**
     * UserController constructor.
     */

  public function __construct(UserDao $userDao)
    {
        $this->userDao = $userDao;
    }

    public function post_user_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (!Auth::attempt($request->only('email','password')))
        {
            return response('invalid credentials');
        }
        return response('authenticated');
    }
}