<!-- Footer -->
<footer class="bg-blue-500 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Download App Section -->
            <div class="flex flex-col items-center space-y-2">
                <span class="font-semibold">Unduh aplikasi kami</span>
                <div class="flex space-x-4">
                    <a href="#" class="hover:opacity-80">
                        <img src="{{ asset('storage/img/Playstore.png') }}" alt="playstore" width="40" />
                    </a>
                    <a href="#" class="hover:opacity-80">
                        <img src="{{ asset('storage/img/Appstore.png') }}" alt="appstore" width="40" />
                    </a>
                </div>
            </div>

            <!-- Help Section -->
            <div class="text-center space-y-2">
                <span class="font-semibold">Butuh bantuan? hubungi kami</span>
                <div class="space-y-1">
                    <a href="https://wa.me/08319343746" class="block hover:underline" target="_blank">Hubungi Kami</a>
                    <a href="#" class="block hover:underline">Bantuan dan FAQ</a>
                    <span class="block">081-333-777-999</span>
                    <span class="block text-sm">Senin – Minggu: 10AM – 8PM</span>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="flex flex-col items-center space-y-2">
                <span class="font-semibold">We accept</span>
                <div class="flex space-x-4">
                    <img src="{{ asset('storage/img/Mandiri.png') }}" alt="mandiri" width="40" />
                    <img src="{{ asset('storage/img/Bca.png') }}" alt="bca" width="40" />
                    <img src="{{ asset('storage/img/Visa.png') }}" alt="visa" width="40" />
                    <img src="{{ asset('storage/img/Mastercard.png') }}" alt="mastercard" width="40" />
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="border-t border-blue-400 mt-8 pt-4 text-center">
            <p class="text-sm">
                © {{ date('Y') }} Baby Care Shop. All rights reserved.
                <span class="mx-2">|</span>
                <a href="#" class="hover:underline">Privacy Policy</a>
                <span class="mx-2">|</span>
                <a href="#" class="hover:underline">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>
