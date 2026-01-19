# ReelQuest

ReelQuest is a movie discovery application I built to experiment with third-party API integration and real-time data fetching using Laravel 12.

### Goal
The main purpose of this repository is for learning and testing. I wanted to see how to handle external movie data within the Laravel ecosystem and practice building a fast, responsive search experience using clean and simple code.

### Tech Stack:
- Laravel 12
- Tailwind CSS
- Vanilla Javascript
- OMDb API 

### What's Inside?
1. **Real-time Search**: Responsive search functionality that fetches movie data as you type.
2. **Backend API Gateway**: Routes external requests through Laravel to keep API credentials secure.
3. **Dynamic Modals**: Displays detailed movie information (Plot, Ratings, Actors) without page refreshes.
4. **Image Fallback System**: Automatically handles missing posters by replacing "N/A" data with a custom placeholder.

### How to Run:

1. **Clone the repository and install dependencies**
    ```bash
    git clone https://github.com/deandamanik/ReelQuest.git
    cd ReelQuest
    composer install
    npm install
    ```

2. **Environment Setup**

    Copy the example environment file and generate the application key:

    ```bash 
    cp .env.example .env
    php artisan key:generate
    ```

3. **Configure API Key**

    Open your .env file and add your OMDb API Key:

    ```bash
    OMDB_API_KEY=your_api_key_here
    ```

4. **Register the Service**

    Ensure the following configuration exists in your config/services.php:

    ```php
    'omdb' => [
        'key' => env('OMDB_API_KEY'),
    ],
    ```

5. **Compile Assets and Start Server**

    Run the frontend compiler and start the local development server:

    ```bash
    npm run dev
    # Open a new terminal tab
    php artisan serve
    ```
