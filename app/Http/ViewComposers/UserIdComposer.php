<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 17.09.18
 * Time: 14:17
 */

namespace App\Http\ViewComposers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserIdComposer
{
    protected $userId = false;

    public function __construct(Request $request)
    {
        if (Auth::check()) {
            $this->userId = Auth::user()->id;
        }
    }

    public function compose(View $view)
    {
        $view->with('userId', $this->userId );
    }
}