@extends('layout.auth')

@section('content')
    <div>
        <div class="text-center mb-8">
            <h1 class="text-2xl font-semibold tracking-tight text-[#000000]">Create Account</h1>
            <p class="text-xs text-zinc-500 tracking-wider uppercase mt-1">Daftar keanggotaan baru</p>
        </div>

        <div id="ajax-alert" class="hidden mb-5 p-3.5 rounded-xl text-xs flex items-center gap-2">
            <span id="ajax-alert-dot" class="w-1.5 h-1.5 rounded-full"></span>
            <span id="ajax-alert-text"></span>
        </div>

        @if(session('success'))
            <div class="mb-5 p-3.5 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 text-xs flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-gray-600 animate-pulse"></span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error') || $errors->any())
            <div class="mb-5 p-3.5 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 text-xs space-y-1">
                @if(session('error'))
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register.process') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required
                    class="w-full px-4 py-3 rounded-xl bg-[#FFFFFF] border border-[#CCCCCC] text-sm text-[#000000] placeholder-zinc-700 focus:outline-none focus:border-[#111827] focus:ring-1 focus:ring-[#111827] transition duration-300">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Email Address</label>
                <div class="grid grid-cols-3 gap-2">
                    <input type="email" name="email" id="reg-email" value="{{ old('email') }}" placeholder="name@domain.com"
                        required
                        class="col-span-2 px-4 py-3 rounded-xl bg-[#FFFFFF] border border-[#CCCCCC] text-sm text-[#000000] placeholder-zinc-700 focus:outline-none focus:border-[#111827] focus:ring-1 focus:ring-[#111827] transition duration-300">
                    <button type="button" id="btn-otp" onclick="sendOtpCode()"
                        class="col-span-1 bg-[#111827] hover:bg-[#1F2937] text-white rounded-xl text-[10px] uppercase tracking-wider font-bold transition duration-300">
                        Kirim OTP
                    </button>
                </div>
            </div>

            <div class="space-y-1.5">
                <label
                    class="text-[10px] uppercase tracking-widest text-[#000000] font-semibold pl-1 flex items-center gap-1.5">
                    <span class="w-1 h-1 rounded-full bg-gray-600"></span> Verification Code (OTP)
                </label>
                <input type="text" name="otp_code" placeholder="Masukkan 6 digit kode" required maxlength="6"
                    class="w-full px-4 py-3 rounded-xl bg-[#FFFFFF] border border-[#CCCCCC] text-sm text-[#000000] placeholder-zinc-700 focus:outline-none focus:border-[#111827] focus:ring-1 focus:ring-[#111827] tracking-[0.2em] font-mono text-center transition duration-300">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Create Password</label>
                <div class="relative">
                    <input type="password" name="password" id="reg-password" placeholder="••••••••" required
                        class="w-full px-4 py-3 rounded-xl bg-[#FFFFFF] border border-[#CCCCCC] text-sm text-[#000000] placeholder-zinc-700 focus:outline-none focus:border-[#111827] focus:ring-1 focus:ring-[#111827] transition duration-300 pr-12">
                    <button type="button" onclick="togglePassword('reg-password', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-black transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full mt-2 bg-[#111827] hover:bg-[#1F2937] text-white py-3 rounded-xl text-xs tracking-wider font-bold uppercase transition duration-300 shadow-lg shadow-white/5">
                Register Account
            </button>
        </form>

        <div class="mt-8 pt-5 border-t border-[#CCCCCC]/60 text-center">
            <p class="text-xs text-zinc-500 tracking-wide">
                Sudah memiliki akun terdaftar?
                <a href="{{ route('login') }}"
                    class="text-gray-700 hover:text-black ml-1 font-medium underline transition duration-300">
                    Sign In disini
                </a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>`;
            } else {
                input.type = 'password';
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>`;
            }
        }

        function sendOtpCode() {
            const email = document.getElementById('reg-email').value;
            const btnOtp = document.getElementById('btn-otp');
            const alertBox = document.getElementById('ajax-alert');
            const alertDot = document.getElementById('ajax-alert-dot');
            const alertText = document.getElementById('ajax-alert-text');

            if (!email) {
                showAlert('rose', 'Silakan masukkan alamat email Anda terlebih dahulu.');
                return;
            }

            btnOtp.disabled = true;
            btnOtp.innerText = 'Mengirim...';
            showAlert('zinc', 'Sedang memproses kode verifikasi ke Gmail...');

            fetch("{{ route('register.send_otp') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ email: email })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showAlert('emerald', data.message);
                        btnOtp.innerText = 'Kirim Ulang';
                        let cooldown = 30;
                        const timer = setInterval(() => {
                            cooldown--;
                            if (cooldown <= 0) {
                                clearInterval(timer);
                                btnOtp.disabled = false;
                                btnOtp.innerText = 'Kirim OTP';
                            } else {
                                btnOtp.innerText = `${cooldown}s`;
                            }
                        }, 1000);
                    } else {
                        showAlert('rose', data.message || 'Gagal mengirim kode OTP.');
                        btnOtp.disabled = false;
                        btnOtp.innerText = 'Kirim OTP';
                    }
                })
                .catch(error => {
                    showAlert('rose', 'Email sudah terdaftar atau terjadi gangguan koneksi server.');
                    btnOtp.disabled = false;
                    btnOtp.innerText = 'Kirim OTP';
                });
        }

        function showAlert(type, message) {
            const alertBox = document.getElementById('ajax-alert');
            const alertDot = document.getElementById('ajax-alert-dot');
            const alertText = document.getElementById('ajax-alert-text');

            alertBox.classList.remove('hidden', 'bg-emerald-500/10', 'border-emerald-500/20', 'text-emerald-400', 'bg-rose-500/10', 'border-rose-500/20', 'text-rose-400', 'bg-zinc-500/10', 'border-zinc-500/20', 'text-zinc-400');
            alertDot.classList.remove('bg-emerald-500', 'animate-pulse', 'bg-rose-500', 'bg-zinc-500');

            if (type === 'emerald') {
                alertBox.classList.add('bg-emerald-500/10', 'border', 'border-emerald-500/20', 'text-emerald-400');
                alertDot.classList.add('bg-emerald-500', 'animate-pulse');
            } else if (type === 'rose') {
                alertBox.classList.add('bg-rose-500/10', 'border', 'border-rose-500/20', 'text-rose-400');
                alertDot.classList.add('bg-rose-500');
            } else {
                alertBox.classList.add('bg-zinc-500/10', 'border', 'border-zinc-500/20', 'text-zinc-400');
                alertDot.classList.add('bg-zinc-500', 'animate-pulse');
            }

            alertText.innerText = message;
            alertBox.classList.remove('hidden');
        }
    </script>
@endsection