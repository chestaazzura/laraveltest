@if (session('success') || session('error'))
    <!-- Toast Container di bawah navbar -->
    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 60px; right: 10px; z-index: 1100; pointer-events: none;">
        <div id="toastNotification" class="toast text-white" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="pointer-events: auto; width: 350px; max-width: none;">
            <div class="toast-header text-white @if (session('success')) bg-success @else bg-danger @endif">
                @if (session('success'))
                    <i class="fas fa-check-circle mr-2"></i>
                @else
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                @endif
                <strong class="mr-auto">Notifikasi</strong>
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body @if (session('success')) bg-success @else bg-danger @endif">
                @if (session('success'))
                    {{ session('success') }}
                @elseif (session('error'))
                    {{ session('error') }}
                @endif
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#toastNotification').toast('show');
        });
    </script>
@endif
