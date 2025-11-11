<section>
    <header>
        <h2 class="text-lg font-medium text-[#ededed]">
            {{ __('Informasi Akun') }}
        </h2>

        <p class="mt-1 text-sm text-zinc-400">
            <!-- {{ __("Update your account's profile information and email address.") }} -->
            {{ __("Perbarui infromasi profile dan alamat email akunmu") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-zinc-400">
                        <!-- {{ __('Your email address is unverified.') }} -->
                        {{ __('Alamat emailmu tidak terverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-zinc-400 hover:text-[#ededed] rounded-md focus:outline-none focus:ring-2  focus:ring-[#ffcc00]">
                            <!-- {{ __('Click here to re-send the verification email.') }} -->
                            {{ __('klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            <!-- {{ __('A new verification link has been sent to your email address.') }} -->
                            {{ __('Link verifikasi baru telah dikirim ke alamat emailmu.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >{{ __('Berhasil disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
