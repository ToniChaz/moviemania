# Moviemania

Moviemania is a web application built using Angular for the frontend, PHP for the backend, and MySQL as the database. It provides users with a platform to discover, rate, and review movies. This README.md file serves as a guide to set up and use the Moviemania application.

## Installation

### Prerequisites
- Node.js and npm installed on your machine.
- PHP installed on your server.
- MySQL database server.

### Dependencies
- angular-cli
- php8
- composer
- php-mysql


### Steps

1. Clone this repository to your local machine and Navigate to the project directory.
```sh
git clone https://github.com/ToniChaz/moviemania.git
cd moviemania
```

2. Install frontend dependencies and Build the Angular application.
```sh
cd frontend
npm install
ng build
```

3. Copy the generated `dist` folder to your `public` PHP folder.

4. Execute the `resources/database.sql` file into your MySQL database.

5. Configure the backend.

    - Navigate to the `backend` directory.

        ```sh
        cd ../backend
        ```

    - Edit the `config.php` file and update the database credentials.
    
6. Start your PHP server.
```sh
php -S localhost:8000
```

7. Access the Moviemania application through your web browser.

http://localhost:8000/public

or consume the API rest on

http://localhost:8000/{some-resource}

## Usage

- **User Registration**: Users can create an account to access the features of the application.
- **Movie Discovery**: Users can search for movies, view details, and get personalized recommendations.
- **Rating and Reviews**: Users can rate movies and write reviews to share their opinions with others.
- **API Endpoints**: The application provides RESTful API endpoints for accessing movie data and user information.

## Contributing

Contributions to Moviemania are welcome! If you find any issues or have suggestions for improvement, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).


