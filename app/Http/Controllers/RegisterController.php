<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 * @package App\Http\Controllers
 */
class RegisterController extends Controller
{
    /**
     * @param StoreUserRequest $request
     * @return array
     */
    public function register(StoreUserRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->toArray();
    }
}
