# Project Description
This is a Laravel project that has been dockerized and uses JWT for authentication. The chosen database is MongoDB. To set up the project, follow the steps below:

## Prerequisites
- Docker and Docker Compose installed on your system.

## Setup Instructions
1. Clone the repository to your local machine.

2. In the project root directory, run the following command to build and start the Docker containers:
   ```bash
   docker-compose up -d --build
   
3. After the containers are up and running, run the following command to clear the configuration cache:
   ```bash
   php artisan config:clear
   
4. Next, update the composer dependencies by running:
   ```bash 
   composer update 
   
5. Seed the database with dummy data using the following command:
   ```bash 
   composer update 
   
6. Update the env file to include the necessary MongoDB configuration. Make sure to set the appropriate values for the MongoDB connection:
   ```bash 
    MONGO_DB_CONNECTION=mongodb
    MONGO_DB_HOST=your_mongodb_host
    MONGO_DB_PORT=your_mongodb_port
    MONGO_DB_DATABASE=your_mongodb_database_name
    MONGO_DB_USERNAME=your_mongodb_username
    MONGO_DB_PASSWORD=your_mongodb_password

7. Also, update the phpunit.xml file to configure the testing database:
   ```bash 
   <server name="MONGO_DB_CONNECTION" value="mongodb"/>
   <server name="MONGO_DB_HOST" value="your_mongodb_host"/>
   <server name="MONGO_DB_PORT" value="your_mongodb_port"/>
   <server name="MONGO_DB_DATABASE" value="your_mongodb_database_name"/>
   <server name="MONGO_DB_USERNAME" value="your_mongodb_username"/>
   <server name="MONGO_DB_PASSWORD" value="your_mongodb_password"/>
   
8. Run the tests to make sure everything is set up correctly:
    ```bash 
   php artisan test

## Usage
- After completing the setup, you can now use the Laravel application with MongoDB as the database and JWT for authentication.

## Mongo Express
- For MongoDB administration, this project uses Mongo Express. You can access the Mongo Express dashboard by visiting http://localhost:8081 in your web browser. Make sure to secure your Mongo Express dashboard by setting up proper authentication and access controls, especially in production environments.

## Note
- Make sure to keep your sensitive information, such as database credentials and JWT secret, secure and do not commit them to version control.

## Contribution
- If you want to contribute to this project, please fork the repository and create a pull request with your proposed changes.
