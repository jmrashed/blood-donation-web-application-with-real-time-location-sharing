# Blood Donation Web Application with Real-Time Location Sharing
This web application is built using Laravel and allows users to find nearby blood donors and share their real-time location. It aims to connect blood donors with individuals in need of blood transfusions.

## Features
- User registration and authentication
- User profiles with blood type information
- Search functionality to find nearby blood donors
- Real-time location sharing for donors
- Notification system for new donation requests
- Admin panel to manage users and donations

## Installation
- Clone the repository: `git clone https://github.com/jmrashed/blood-donation-web-app.git`
- Navigate to the project directory: `cd blood-donation-web-app`
- Install dependencies: `composer install`
- Create a copy of the `.env` file: `cp .env.example .env`
- Generate the application key: `php artisan key:generate`
- Configure the database in the `.env` file
- Run database migrations: `php artisan migrate:fresh --seed`
- Start the development server: `php artisan serve`


## Usage
- Access the application in your browser at `http://localhost:8000`
- Register a new user account or login with existing credentials
- Complete your profile with your blood type information
- Use the search functionality to find nearby blood donors
- If you are a donor, enable real-time location sharing
- Receive notifications for new donation requests
- Admins can access the admin panel at `http://localhost:8000/admin` to manage users and donations



## Contributing
Contributions are welcome! If you would like to contribute to this project, please follow these steps:

- Fork the repository
- Create a new branch for your feature or bug fix
- Commit your changes
- Push your branch to your forked repository
- Submit a pull request


## License
This project is licensed under the MIT License.

## Acknowledgments
- This project was inspired by the need for a reliable blood donation web application to connect donors with recipients.
- Special thanks to the Laravel community for their excellent documentation and support.

Please note that this is just an example, and you should customize the README.md file to include relevant information about your specific project, installation steps, usage instructions, and contribution guidelines.

