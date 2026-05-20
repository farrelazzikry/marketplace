@extends('layout.auth')

@section('content')
    <div>
        {{-- Header Form --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold tracking-tight text-white font-serif-luxury italic">Create Account</h1>
            <p class="text-xs text-zinc-500 tracking-wider uppercase mt-1">Daftar keanggotaan baru</p>
        </div>

        {{-- Notifikasi Error/Sukses Internal Form --}}
        <div id="ajax-alert" class="hidden mb-5 p-3.5 rounded-xl text-xs flex items-center gap-2">
            <span id="ajax-alert-dot" class="w-1.5 h-1.5 rounded-full"></span>
            <span id="ajax-alert-text"></span>
        </div>

        @if(session('success'))
            <div
                class="mb-5 p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div
                class="mb-5 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-5 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 rounded-full bg-rose-500"></span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Form Data --}}
        <form method="POST" action="{{ route('register.process') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
            </div>

            {{-- Kolom Email + Tombol Kirim OTP Berdampingan --}}
            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Email Address</label>
                <div class="grid grid-cols-3 gap-2">
                    <input type="email" name="email" id="reg-email" value="{{ old('email') }}" placeholder="name@domain.com"
                        required
                        class="col-span-2 px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
                    <button type="button" id="btn-otp" onclick="sendOtpCode()"
                        class="col-span-1 bg-zinc-900 hover:bg-zinc-800 text-zinc-300 hover:text-white border border-zinc-800 rounded-xl text-[10px] uppercase tracking-wider font-bold transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Kirim OTP
                    </button>
                </div>
            </div>

            {{-- Input Kolom Kode OTP Baru --}}
            <div class="space-y-1.5">
                <label
                    class="text-[10px] uppercase tracking-widest text-[#D4AF37] font-semibold pl-1 flex items-center gap-1.5">
                    <span class="w-1 h-1 rounded-full bg-[#D4AF37]"></span> Verification Code (OTP)
                </label>
                <input type="text" name="otp_code" placeholder="Masukkan 6 digit kode" required maxlength="6"
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] tracking-[0.2em] font-mono text-center transition duration-300">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase tracking-widest text-zinc-400 font-medium pl-1">Create Password</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full px-4 py-3 rounded-xl bg-black border border-zinc-900 text-sm text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition duration-300">
            </div>

            <button type="submit"
                class="w-full mt-2 bg-white hover:bg-[#D4AF37] text-black py-3 rounded-xl text-xs tracking-wider font-bold uppercase transition duration-300 shadow-lg shadow-white/5">
                Register Account
            </button>
        </form>

        {{-- Footer Form Navigation --}}
        <div class="mt-8 pt-5 border-t border-zinc-900/60 text-center">
            <p class="text-xs text-zinc-500 tracking-wide">
                Sudah memiliki akun terdaftar?
                <a href="{{ route('login') }}"
                    class="text-white hover:text-[#D4AF37] ml-1 font-medium underline transition duration-300">
                    Sign In disini
                </a>
            </p>
        </div>
    </div>

    {{-- Handler JS AJAX untuk Pengiriman OTP Tanpa Reload --}}
    <script>
        function sendOtpCode() {
            const email = document.getElementById('reg-email').value;
            const btnOtp = document.getElementById('btn-otp');
            const alertBox = document.getElementById('ajax-alert');
            const alertDot = document.getElementById('ajax-alert-dot');
            const alertText = document.getElementById('ajax-alert-text');

            // Validasi email kosong di sisi client
            if (!email) {
                showAlert('rose', 'Silakan masukkan alamat email Anda terlebih dahulu.');
                return;
            }

            // Kunci tombol dan ubah indikator teks
            btnOtp.disabled = true;
            btnOtp.innerText = 'Mengirim...';
            showAlert('zinc', 'Sedang memproses kode verifikasi ke Gmail...');

            // Lakukan Fetch API AJAX ke backend Laravel
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

                        // Beri cooldown tombol selama 30 detik agar tidak di-spam user
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

        // Helper function untuk memanipulasi alert box Tailwind secara dinamis
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