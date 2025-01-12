<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function show($id) {
        # Retrieve user details and redirect to the
        # show.blade.php (inside profile folder),
        # and try to display the user details here.
        $user = $this->user->findOrFail($id);

        return view('users.profile.show')->with('user', $user);
    }

    public function edit() {
        $user = $this->user->findOrFail(Auth::user()->id);
        return view('users.profile.edit')->with('user', $user);
    }

    # Note: this method is going to perform the axtual updating of data
    public function update(Request $request) {
        #1. Validate the data first
        $request->validate([
            'name' => 'required|min:1|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . Auth::user()->id,
            'avatar' => 'mimes:jpg,jpeg,png,gif|max:1048',
            'introduction' => 'max:100'
        ]);

        # 2. If the validation above don't have any errors, then received the data coming from the form if
        $user = $this->user->findOrFail(Auth::user()->id); // search for the user id
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $request->avatar;
        $user->introduction = $request->introduction;

        # Check if there is an uploaded avatar/image
        if ($request->avatar) {
            $user->avatar = 'data:image/' . $request->avatar->extension() . ';base64,' . base64_encode(file_get_contents($request->avatar));
        }

        # 3 Save the info into the users table
        $user->save();

        # 4. Redirect to the profile page
        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function followers($id) {
        $user = $this->user->findOrFail($id);
        return view('users.profile.followers')->with('user', $user);
    }

    public function following($id) {
        $user = $this->user->findOrFail($id);
        return view('users.profile.following')->with('user', $user);
    }
}
