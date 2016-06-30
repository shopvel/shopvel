<?php
namespace Shopvel\Backend\Controller\Auth;

use Shopvel\Backend\Controller\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;

    protected $guard = 'admin';
    protected $broker = 'admins';
    protected $redirectTo = 'backend';

    /**
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());
    }
}