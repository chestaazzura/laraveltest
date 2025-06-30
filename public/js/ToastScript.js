// Toast notification functions
document.addEventListener("DOMContentLoaded", function () {
    // Show toast if exists
    var toast = document.getElementById("toastNotification");
    if (toast) {
        // Bootstrap 4/5 compatibility
        if (typeof bootstrap !== "undefined" && bootstrap.Toast) {
            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        } else if (typeof $ !== "undefined" && $.fn.toast) {
            $(toast).toast("show");
        }
    }
});

// Function to show custom toast
function showToast(message, type = "success") {
    var toastContainer = document.querySelector('[aria-live="polite"]');
    if (!toastContainer) return;

    var toastId = "toast-" + Date.now();
    var bgClass = type === "success" ? "bg-success" : "bg-danger";
    var iconClass =
        type === "success"
            ? "fas fa-check-circle"
            : "fas fa-exclamation-triangle";

    var toastHTML = `
        <div id="${toastId}" class="toast ${bgClass} text-white" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="pointer-events: auto; width: 350px; max-width: none;">
            <div class="toast-header ${bgClass} text-white">
                <i class="${iconClass} mr-2"></i>
                <strong class="mr-auto">Notifikasi</strong>
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;

    toastContainer.innerHTML = toastHTML;

    var newToast = document.getElementById(toastId);
    if (typeof $ !== "undefined" && $.fn.toast) {
        $(newToast).toast("show");
    }
}
