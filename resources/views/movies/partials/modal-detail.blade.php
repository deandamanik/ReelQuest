<div id="movieModal" class="hidden fixed inset-0 z-50">

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">

        <div class="absolute inset-0 bg-brand-bg/80 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

        <div id="modalContent" class="relative bg-brand-card w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-main border border-brand-border shadow-hover transition-all transform scale-95 opacity-0">

            <div id="modalBody" class="p-6 md:p-8">
                </div>

            <button onclick="closeModal()" class="absolute top-4 right-4 p-2 rounded-full bg-brand-bg/50 text-brand-muted hover:text-brand-text transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>
</div>
