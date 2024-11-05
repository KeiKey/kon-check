# Kon Check

This project is a Dockerized setup for running a Laravel application. It includes configurations for NGINX, MySQL, PHP, and Node.js.

## Running app locally

### Prerequisites

Before you begin, ensure you these dependencies installed on your machine.

- Git
- Docker >= 20.10.22
- Docker Compose >= 2.15.1

### Prerequisites

1. Clone this repository to your machine:

    ```bash
    git clone https://github.com/KeiKey/kon-check
    cd kon-check
    ```

2. Create a copy of the `.env.example` file and rename it to `.env`. Update the database configurations in the `.env`.
   Fill the key's `OPEN_API_BASE_URL`, `VERSION`, `API_KEY` and `TTS_MODEL`,  with the correct values.

3. Build and start the Docker containers by running the build script:

    ```bash
    ./build.sh
    ```

4. Install JavaScript & PHP dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

5. Run these commands:

    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan passport:install
    ```

6. Access your Laravel application at [http://localhost:8000](http://localhost:8000).