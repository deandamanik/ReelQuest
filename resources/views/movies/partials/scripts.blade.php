<script>
    const searchInput = document.getElementById('searchInput');
    const movieGrid = document.getElementById('movieGrid');
    const loader = document.getElementById('loader');
    const emptyState = document.getElementById('emptyState');
    const movieModal = document.getElementById('movieModal');
    const modalContent = document.getElementById('modalContent');
    const modalBody = document.getElementById('modalBody');

    let timeout = null;

    searchInput.addEventListener('input', function() {
        clearTimeout(timeout);
        const query = this.value.trim();

        if (query.length === 0) {
            movieGrid.innerHTML = '';
            emptyState.classList.remove('hidden');
            return;
        }

        timeout = setTimeout(() => {
            if (query.length > 2) fetchMovies(query);
        }, 500);
    });

    async function fetchMovies(query) {
        loader.classList.remove('hidden');
        emptyState.classList.add('hidden');

        try {
            const response = await fetch(`/api/movies?q=${query}`);
            const data = await response.json();
            displayMovies(data);
        } catch (error) {
            console.error('Fetch error:', error);
        } finally {
            loader.classList.add('hidden');
        }
    }

    function displayMovies(movies) {
        movieGrid.innerHTML = '';
        if (!movies || movies.length === 0) {
            movieGrid.innerHTML = `<p class="col-span-full text-center text-brand-muted py-20">No results found.</p>`;
            return;
        }

        movies.forEach(movie => {
            const poster = movie.Poster !== 'N/A' ? movie.Poster : 'https://via.placeholder.com/400x600?text=No+Poster';

            const card = document.createElement('div');
            card.className = 'group cursor-pointer';
            card.innerHTML = `
                <div class="relative aspect-[2/3] rounded-inner overflow-hidden bg-brand-card border border-brand-border shadow-subtle group-hover:shadow-hover transition-all duration-300">
                    <img src="${poster}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-bg/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4 text-xs font-medium">
                        <span class="bg-brand-primary text-white px-3 py-1 rounded-full shadow-lg">Details</span>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-sm font-semibold truncate text-brand-text group-hover:text-brand-primary transition-colors">${movie.Title}</h3>
                    <p class="text-xs text-brand-muted mt-1 tracking-wide">${movie.Year} • ${movie.Type}</p>
                </div>
            `;

            card.onclick = () => openModal(movie.imdbID);
            movieGrid.appendChild(card);
        });
    }

    async function openModal(imdbID) {
        movieModal.classList.remove('hidden');

        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        modalBody.innerHTML = `
            <div class="flex justify-center py-20">
                <div class="w-8 h-8 border-4 border-brand-primary border-t-transparent rounded-full animate-spin"></div>
            </div>
        `;

        setTimeout(() => {
            modalBody.innerHTML = `
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-brand-text">Movie Detail</h2>
                    <p class="text-brand-muted">Film ID: <span class="text-brand-primary font-mono">${imdbID}</span></p>
                    <div class="p-4 bg-brand-bg rounded-inner border border-brand-border">
                        <p class="text-sm italic text-brand-muted">Complete detailed information (Synopsis, Rating, Genre) will be coming soon.</p>
                    </div>
                </div>
            `;
        }, 800);
    }

    function closeModal() {
        modalContent.classList.add('scale-95', 'opacity-0');
        modalContent.classList.remove('scale-100', 'opacity-100');
        setTimeout(() => {
            movieModal.classList.add('hidden');
        }, 200);
    }
</script>
