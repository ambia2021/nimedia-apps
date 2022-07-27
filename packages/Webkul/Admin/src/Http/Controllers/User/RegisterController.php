<?php

namespace Webkul\Admin\Http\Controllers\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\User\Repositories\UserRepository;


class RegisterController extends Controller
{
 
    public function index()
    {
        // $user = auth()->guard('user')->user();
        // $this->validate(request(), [
        //     'name'             => 'required',
        //     'email'            => 'email|unique:users,email,' . $user->id,
        //     'password'         => 'nullable|min:6|confirmed',
        //     'confirm_password' => 'nullable|required|min:6',
        // ]);
        // session()->flash('success', trans('admin::app.user.account.create'));

        // return redirect()->route('admin.dashboard.index');
        return view('admin::sessions.register');

    }

    public function create(){
        $this->validate(request(), [
            'email'            => 'required|email|unique:users,email',
            'name'             => 'required',
            'password'         => 'nullable',
            'confirm_password' => 'nullable|required_with:password|same:password',
            // 'role_id'          => 'nullable',
        ]);

        $data = request()->all();

        if (isset($data['password']) && $data['password']) {
            $data['password'] = bcrypt($data['password']);
        }

        $data['status'] = isset($data['status']) ? 1 : 1;
        $data['role_id'] = isset($data['role_id']) ? 1 : 1;


        $this->userRepository->create($data);

        session()->flash('success', trans('admin::app.settings.users.create-success'));

        return redirect()->route('admin.dashboard');
    }
   
}
