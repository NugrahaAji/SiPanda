<?php

namespace App\Policies;

use App\Models\SuratMasuk;
use App\Models\User;

class SuratMasukPolicy
{
    public function view(User $user, SuratMasuk $suratMasuk): bool
    {
        return $user->id === $suratMasuk->user_id;
    }

    public function update(User $user, SuratMasuk $suratMasuk): bool
    {
        return $user->id === $suratMasuk->user_id;
    }

    public function delete(User $user, SuratMasuk $suratMasuk): bool
    {
        return $user->id === $suratMasuk->user_id;
    }
}
