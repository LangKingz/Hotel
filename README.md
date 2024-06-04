# Laravel Jetstream with Livewire and Tailwind CSS

This project is a Laravel application using Jetstream with Livewire and Tailwind CSS. It uses Vite for managing and building frontend assets.

## Prerequisites

Make sure you have the following installed on your development machine:

-   [PHP](https://www.php.net/downloads.php) (>=7.4)
-   [Composer](https://getcomposer.org/download/)
-   [Node.js](https://nodejs.org/) (>=14.x)
-   [NPM](https://www.npmjs.com/get-npm) (comes with Node.js)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/your-username/your-repo.git
    cd your-repo
    ```

2. **Install PHP dependencies:**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies:**

    ```bash
    npm install
    ```

4. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

5. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run migrations:**

    ```bash
    php artisan migrate
    ```

## Development

During development, you can run the development server and watch for changes using:

```bash
    npm run build
```

This will start Vite in development mode, enabling hot module replacement (HMR).

## Building for Production

To build the assets for production, run:

```bash
npm run build
```

This will create optimized and minified files in the `public/build` directory.

## Deployment

1. **Install PHP dependencies on the server:**

    ```bash
    composer install --optimize-autoloader --no-dev
    ```

2. **Install Node.js dependencies and build assets:**

    ```bash
    npm install
    npm run build
    ```

3. **Run migrations:**

    ```bash
    php artisan migrate --force
    ```

4. **Ensure the `public/build/manifest.json` file exists:**

    ```bash
    ls public/build/manifest.json
    ```

5. **Restart your server to apply the changes.**

## Continuous Integration / Continuous Deployment (CI/CD)

If you are using a CI/CD pipeline, add the following steps to your configuration file (e.g., GitHub Actions, GitLab CI):

Example for GitHub Actions (`.github/workflows/deploy.yml`):

```yaml
name: Build and Deploy

on:
    push:
        branches:
            - main

jobs:
    build:
        runs-on: ubuntu-latest

        steps:
            - name: Checkout repository
              uses: actions/checkout@v2

            - name: Set up Node.js
              uses: actions/setup-node@v2
              with:
                  node-version: "16"

            - name: Install dependencies
              run: npm install

            - name: Build assets
              run: npm run build

            - name: Install PHP dependencies
              run: composer install --optimize-autoloader --no-dev

            - name: Deploy to Server
              run: |
                  # Add your deployment steps here, such as using rsync, scp, or deploy to your hosting service
```

## Troubleshooting

### Vite manifest not found

If you encounter the error `Vite manifest not found`, ensure you have built the assets using `npm run build` and that the `public/build/manifest.json` file exists. This file is required for Vite to properly load your assets.

### Environment Variables

Ensure your `.env` file is correctly configured and all necessary environment variables are set. This includes database connection details, application keys, and any other required configuration.

## Contributing

Please fork the repository and create a pull request with your changes. Ensure your code follows the established coding standards and includes relevant tests where applicable.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

```

```
