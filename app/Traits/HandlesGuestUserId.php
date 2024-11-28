<?php

namespace App\Traits;

trait HandlesGuestUserId
{
    public function getGuestUserId()
    {
        if (!session()->has('guest_user_id')) {
            // Generate a random integer as guest user ID
            $guestUserId = random_int(100000, 999999);

            // Store it in the session
            session(['guest_user_id' => $guestUserId]);
        }

        return session('guest_user_id');
    }
}
