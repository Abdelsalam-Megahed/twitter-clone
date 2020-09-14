<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user
                ->tweets()
                ->withLikes()
                ->paginate(50),
        ]);
    }

    public function edit(User $user){
//        abort_if( $user->isNot( auth()->user() ), 404 );
//        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){

        $attributes = request()->validate([
            'avatar' => ['file'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'max:255', 'required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed']
        ]);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        $user->update($attributes);

        return redirect( $user->path() );
    }
}
