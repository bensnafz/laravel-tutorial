<?php

namespace App\Services;
//****** */
use App\Models\User;

class UserService
{
    public function getAll()
    {
        return User::get();
    }

    public function create($name, $email, $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function getByID($id)
    {
        return User::where('id',$id)->firstOrFail();
    }

    public function update($id, $name, $email, $password)
    {
        $user = User::where('id',$id)->firstOrFail();
        $user->update([
            'name' => $name,
            'email' => $email,
            'password' => $password
            ]);
        return $user;
    }

    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }


}

?>
