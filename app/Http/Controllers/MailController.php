<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Database\Eloquent\Factories\Factory;
class MailController extends Controller
{
    public function testMail() 
    {

        // Mail::to('test@mail.com')->send(new TestMail());
        return response()->json(['mail' => 'ok  mail'], 200);
    }

    public function resetAndMail(Request $request)
    {
        $newpass = '12345678';
        dd($this->faker->sentence());
        $user = User::where('email','=', $request->email)
            ->first();
            
        $user->update([
            'password' => Hash::make($newpass)
        ]);

        Mail::to('test@mail.com')->send(new TestMail($user, $newpass));

    }
}
