# Monastery

Brief description or introduction of the project.

## Prerequisites

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

1. Clone the repository:

   ```bash
   git clone <repository_url>
   ```

2. Navigate to the project directory:

   ```bash
   cd <project_directory>
   ```

3. Create a `.env` file:

   ```bash
   cp .env.example .env
   ```

4. Modify the `.env` file with your desired configurations (database credentials, etc.).

5. Build the Docker containers:

   ```bash
   docker-compose build
   ```

6. Start the Docker containers:

   ```bash
   docker-compose up -d
   ```

7. Install Composer dependencies:

   ```bash
   docker-compose exec php composer install
   ```

8. Generate the application key:

   ```bash
   docker-compose exec php php artisan key:generate
   ```

9. Run database migrations:

   ```bash
   docker-compose exec php php artisan migrate
   ```

10. Access the application:

    Open your web browser and visit [http://localhost:9000](http://localhost:9000).

## Development Workflow

- Make code changes as required.
- To stop the Docker containers, run:

  ```bash
  docker-compose down
  ```

- To start the Docker containers again, run:

  ```bash
  docker-compose up -d
  ```

## Troubleshooting

- If you encounter any issues or errors, please check the Docker logs:

  ```bash
  docker-compose logs
  ```

- For more detailed troubleshooting, refer to the Docker and Laravel documentation.
