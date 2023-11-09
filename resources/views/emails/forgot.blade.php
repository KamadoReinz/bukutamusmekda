@component('mail::message')
    Hello {{ $user->name }},

    Kami Memahami Hal Itu Terjadi.

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
    Atur Ulang Kata Sandi
@endcomponent

<p>Jika Anda Mengalami Masalah Dalam Memulihkan Kata Sandi, Silakan Hubungi Kami.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent