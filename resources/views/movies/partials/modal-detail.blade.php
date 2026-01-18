<div id="movieModal" class="hidden fixed inset-0 z-50">
    <div class="flex items-center justify-center min-h-screen p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-bg/80 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
        <div id="modalContent" class="relative bg-brand-card w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-main border border-brand-border shadow-hover transition-all transform scale-95 opacity-0">
            <div id="modalBody" class="p-6 md:p-8"></div>
            <button onclick="closeModal()" class="absolute top-4 right-4 p-2 rounded-full bg-brand-bg/50 text-brand-muted hover:text-brand-text transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>
</div>

<template id="movieDetailTemplate">
    <div class="flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/3 shrink-0">
            <img id="md-poster" src="" class="w-full rounded-inner shadow-lg border border-brand-border object-cover">
        </div>
        <div class="flex-1 space-y-6">
            <div>
                <h2 id="md-title" class="text-2xl font-bold text-brand-text leading-tight"></h2>
                <div class="flex flex-wrap items-center gap-3 mt-3 text-xs font-medium uppercase tracking-wider">
                    <span id="md-year" class="text-brand-primary"></span>
                    <span id="md-rated" class="px-2 py-0.5 border border-brand-border rounded text-brand-muted"></span>
                    <span id="md-runtime" class="text-brand-muted"></span>
                </div>
            </div>
            <div class="flex gap-4 border-y border-brand-border py-4 text-sm font-medium">
                <div class="text-center border-r border-brand-border pr-4">
                    <p class="text-[10px] text-brand-muted uppercase mb-1">IMDb Rating</p>
                    <p id="md-rating" class="text-brand-text"></p>
                </div>
                <div>
                    <p class="text-[10px] text-brand-muted uppercase mb-1">Genre</p>
                    <p id="md-genre" class="text-brand-text"></p>
                </div>
            </div>
            <div>
                <p class="text-[10px] text-brand-muted uppercase mb-2 font-bold tracking-widest">Synopsis</p>
                <p id="md-plot" class="text-sm text-brand-muted leading-relaxed"></p>
            </div>
            <div class="grid grid-cols-2 gap-4 pt-4 text-sm border-t border-brand-border">
                <div>
                    <p class="text-[10px] text-brand-muted uppercase mb-1">Director</p>
                    <p id="md-director" class="text-brand-text"></p>
                </div>
                <div>
                    <p class="text-[10px] text-brand-muted uppercase mb-1">Actors</p>
                    <p id="md-actors" class="text-brand-text"></p>
                </div>
            </div>
        </div>
    </div>
</template>
