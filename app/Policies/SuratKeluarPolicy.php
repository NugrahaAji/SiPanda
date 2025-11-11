<?php

namespace App\Policies;

use App\Models\SuratKeluar;
use App\Models\User;

class SuratKeluarPolicy
{
    public function view(User $user, SuratKeluar $suratKeluar): bool
    {
        return $user->id === $suratKeluar->user_id;
    }

    public function update(User $user, SuratKeluar $suratKeluar): bool
    {
        return $user->id === $suratKeluar->user_id;
    }

    public function delete(User $user, SuratKeluar $suratKeluar): bool
    {
        return $user->id === $suratKeluar->user_id;
    }
}
