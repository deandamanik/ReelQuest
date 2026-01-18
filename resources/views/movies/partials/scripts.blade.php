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
        }, 100);
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

        const template = document.getElementById('movieCardTemplate');

        movies.forEach(movie => {
            const content = template.content.cloneNode(true);
            const placeholder = '/img/no-poster.png';
            const posterSrc = (movie.Poster && movie.Poster !== 'N/A') ? movie.Poster : placeholder;
            const cardWrapper = content.querySelector('.group');
            const imgElement = content.getElementById('mc-poster');

            imgElement.src = posterSrc;

            imgElement.onerror = function() {
                this.src = placeholder;
            };

            content.getElementById('mc-title').textContent = movie.Title;
            content.getElementById('mc-info').textContent = `${movie.Year} • ${movie.Type}`;

            cardWrapper.onclick = () => openModal(movie.imdbID);
            movieGrid.appendChild(content);
        });
    }

    async function openModal(imdbID) {
        movieModal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        modalBody.innerHTML = `
            <div class="flex justify-center items-center py-40">
                <div class="w-10 h-10 border-4 border-brand-primary border-t-transparent rounded-full animate-spin"></div>
            </div>
        `;

        try {
            const response = await fetch(`/api/movies/detail?id=${imdbID}`);
            const movie = await response.json();

            const template = document.getElementById('movieDetailTemplate');
            const content = template.content.cloneNode(true);

            const placeholder = '/img/no-poster.png';
            const detailPoster = (movie.Poster && movie.Poster !== 'N/A') ? movie.Poster : placeholder;

            const modalImg = content.getElementById('md-poster');
            modalImg.src = detailPoster;
            modalImg.onerror = function() {
                this.src = placeholder;
            };

            content.getElementById('md-title').textContent = movie.Title;
            content.getElementById('md-year').textContent = movie.Year;
            content.getElementById('md-rated').textContent = movie.Rated;
            content.getElementById('md-runtime').textContent = movie.Runtime;
            content.getElementById('md-rating').textContent = `${movie.imdbRating}`;
            content.getElementById('md-genre').textContent = movie.Genre;
            content.getElementById('md-plot').textContent = movie.Plot;
            content.getElementById('md-director').textContent = movie.Director;
            content.getElementById('md-actors').textContent = movie.Actors;

            modalBody.innerHTML = '';
            modalBody.appendChild(content);
        } catch (error) {
            modalBody.innerHTML = `<div class="text-center py-20 text-red-500 font-medium">Failed to load movie details.</div>`;
        }
    }

    function closeModal() {
        modalContent.classList.add('scale-95', 'opacity-0');
        modalContent.classList.remove('scale-100', 'opacity-100');
        setTimeout(() => {
            movieModal.classList.add('hidden');
        }, 200);
    }
</script>
