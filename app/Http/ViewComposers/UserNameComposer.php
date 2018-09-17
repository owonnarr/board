<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 13.09.18
 * Time: 21:34
 */

namespace App\Http\ViewComposers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserNameComposer
{

    protected $userName;

    public function __construct(Request $request)
    {
        if (Auth::check()) {
            $this->userName = Auth::user()->username;
        }
    }

    public function compose(View $view)
    {
       $view->with('userName', $this->userName );
    }
}