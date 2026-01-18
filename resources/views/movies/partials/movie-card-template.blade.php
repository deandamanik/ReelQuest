<template id="movieCardTemplate">
    <div class="group cursor-pointer">
        <div class="relative aspect-2/3 rounded-inner overflow-hidden bg-brand-card border border-brand-border shadow-subtle group-hover:shadow-hover transition-all duration-300">
            <img id="mc-poster" src="" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-linear-to-t from-brand-bg/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4 text-xs font-medium">
                <span class="bg-brand-primary text-white px-3 py-1 rounded-full shadow-lg">Details</span>
            </div>
        </div>
        <div class="mt-4">
            <h3 id="mc-title" class="text-sm font-semibold truncate text-brand-text group-hover:text-brand-primary transition-colors"></h3>
            <p id="mc-info" class="text-xs text-brand-muted mt-1 tracking-wide"></p>
        </div>
    </div>
</template>
