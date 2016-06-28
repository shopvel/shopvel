<?php
namespace Shopvel\Admin\Auth;

use Shopvel\Models\Admin as User;
use Validator;
use Shopvel\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login
     *
     * @var string
     */
    protected $redirectTo = 'admin';
    protected $redirectAfterLogout = 'admin/login';
    protected $guard = 'admin';

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
}