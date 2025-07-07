@if (session('success') || session('error'))
    <div id="toastNotification"
         class="fixed top-5 right-5 z-50 max-w-sm w-full bg-opacity-90 rounded-lg shadow-lg px-5 py-4 flex items-start space-x-3 transition transform duration-500 ease-out
         {{ session('success') ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
         
        <div class="text-xl">
            @if (session('success'))
                <i class="fas fa-check-circle"></i>
            @else
                <i class="fas fa-exclamation-triangle"></i>
            @endif
        </div>

        <div class="flex-1 text-sm">
            {{ session('success') ?? session('error') }}
        </div>

        <button onclick="document.getElementById('toastNotification').remove()"
                class="text-white hover:text-gray-200 text-xl leading-none">
            &times;
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const toast = document.getElementById('toastNotification');
                if (toast) {
                    toast.classList.add('opacity-0', 'translate-x-5');
                    setTimeout(() => toast.remove(), 500);
                }
            }, 4000); // hilang setelah 4 detik
        });
    </script>
@endif
