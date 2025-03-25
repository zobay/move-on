# Project Setup Guideline

## Getting Started

### Prerequisites
- PHP 8.1 or higher
- Composer


### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/zobay/move-on.git
    cd move-on
    ```

2. Install PHP dependencies:
    ```sh
    composer install
    ```

3. Set up environment variables:
    ```sh
    cp .env.example .env
    ```
   Update the `.env` file with your environment settings.

4. Generate application key:
    ```sh
    php artisan key:generate
    ```

5. Run migrations:
    ```sh
    php artisan migrate
    ```

6. Serve the application:
    ```sh
    php artisan serve
    ```
   The application will be available at `http://localhost:8000`.

### Additional Information

**Attention:** I have skipped authentication and authorization for simplicity. I have added the documentation in `docs` folder of the project.
