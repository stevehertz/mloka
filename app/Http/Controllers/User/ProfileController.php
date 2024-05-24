<?php

namespace App\Http\Controllers\User;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateUserRequest;

class ProfileController extends Controller
{
    //
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index(Shop $shop)
    {
        return view('profile.index', [
            'shop' => $shop
        ]);
    }

    public function update(UpdateUserRequest $request)
    {

        $data = $request->except("_token");
        if ($request->file('profile')) {
            $path = $request->file('profile')->store('users', 'public');
        }else{
            $path = Auth::user()->profile;
        }
        $user = $this->userRepository->updateProfile($data, $path);
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.updated', ['title' => 'profile'])
            ]);
        }
    }
}
