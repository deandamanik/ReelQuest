<header class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-16">
    <div>
        <h1 class="text-2xl font-bold tracking-tight text-brand-text">ReelQuest</h1>
        <p class="text-brand-muted text-sm mt-1">Explore movies and series effortlessly.</p>
    </div>

    <div class="relative w-full md:w-96">
        <input type="text" id="searchInput" placeholder="Search movies..."
            class="w-full bg-brand-card border border-brand-border py-3 px-5 rounded-full focus:outline-none focus:ring-2 focus:ring-brand-primary/50 transition-all placeholder:text-slate-500 shadow-subtle text-sm text-brand-text">

        <div id="loader" class="hidden absolute right-4 top-3">
            <div class="w-4 h-4 border-2 border-brand-primary border-t-transparent rounded-full animate-spin"></div>
        </div>
    </div>
</header>
