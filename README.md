# Moviemania

Moviemania is a web application built using Angular for the frontend, PHP for the backend, and MySQL as the database. 
It provides users with a platform to discover, rate, and review movies. 
This README.md file serves as a guide to set up and use the Moviemania application.

## Installation

### Prerequisites
- NodeJS and npm installed on your machine.
- PHP installed on your server.
- MySQL database server.

### Dependencies
- angular-cli
- php8.1-cli 
- php8.1-mysql
- composer

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
npm run build
```

3. Copy the generated `dist/browser` folder to your `public` PHP folder. THIS STEP YOU CAN IGNORE IS EXECUTING THE POSTBUILD

4. Execute the `resources/database.sql` file into your MySQL database.

5. Configure the backend.

    - Navigate to the `backend` directory.

        ```sh
        cd ../backend
        ```

    - Edit the `includes/db.php` file and update the database credentials.
    
6. Start your PHP server.
```sh
php -S localhost:8080
```

7. Access the Moviemania application through your web browser.

http://localhost:8000/public

or consume the API rest on

http://localhost:8000/api/{some-resource}


## API

>  GET /users
>  ```sh
>  curl --location --request GET 'http://localhost:8080/api/users'
>  ```

>  GET /users/{id}
>  ```sh
>  curl --location --request GET 'http://localhost:8080/api/users/1'
>  ```

>  POST /users
>  ```sh
>  curl --location --request POST 'http://localhost:8080/api/users' \
>       --header 'Content-Type: application/x-www-form-urlencoded' \
>       --data-urlencode 'username="username17"' \
>       --data-urlencode 'name="User Name 1001"' \
>       --data-urlencode 'password="123456"' \
>       --data-urlencode 'birthdate="1980-10-10"' \
>       --data-urlencode 'email="username1001@gmail.com"'
>  ```

>  PUT /users
>  ```sh
>  curl --location --request PUT 'http://localhost:8080/api/users/1' \
>       --header 'Content-Type: application/x-www-form-urlencoded' \
>       --data-urlencode 'username=userchanged' \
>       --data-urlencode 'name=New Name' \
>       --data-urlencode 'password=password1' \
>       --data-urlencode 'birthdate=1981-10-15' \
>       --data-urlencode 'email=newmail@mail.com'
>  ```

>  DELETE /users
>  ```sh
>  curl --location --request DELETE 'http://localhost:8080/api/users/2'
>  ```

>  POST /login
>  ```sh
>  curl --location --request POST 'http://localhost:8080/api/login' \
>       --header 'Content-Type: application/x-www-form-urlencoded' \
>       --data-urlencode 'username="user8"' \
>       --data-urlencode 'password="password8"'
>  ```

## Docker compose

>  ```sh
>  docker-compose up
>  ```

## Usage

- **User Registration**: Users can create an account to access the features of the application.
- **Movie Discovery**: Users can search for movies, view details, and get personalized recommendations.
- **Rating and Reviews**: Users can rate movies and write reviews to share their opinions with others.
- **API Endpoints**: The application provides RESTful API endpoints for accessing movie data and user information.

## Contributing

Contributions to Moviemania are welcome! If you find any issues or have suggestions for improvement, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).


