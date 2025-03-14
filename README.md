# Login Session Project

## Overview
This project provides a simple login session system using PHP. It includes user authentication, signup, login, and logout functionalities with basic styling.

## Features
- User Authentication:
   - Secure registration.
   - password hashing.
   - session-based authentication, and logout.
- Database Integration:
   - MySQL connection.
   - prepared statements.
   - user data persistence.
   - email validation.
- Security:
   - Password hashing.
   - SQL injection prevention.
   - XSS prevention.
   - input sanitization.
   - secure sessions.
- UI/UX:
   - Responsive design.
   - dark/light theme switching.


## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/Arxsher/login-session.git
   ```
2. Set up your MySQL database and import the schema:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(255),
       email VARCHAR(255) UNIQUE,
       password VARCHAR(255)
   );
   ```
3. Configure your database connection in `config.php`
4. Start your local server
5. Access the application through your web browser

## File Structure
```
LoginSession/
│-- index.php                    # Login page
│-- dashboard.php                # User dashboard with theme switching
│-- config.php                   # Database configuration
│-- auth/
│ ├── SignUp.php                 # User registration page
│ ├── login.php                  # Login processing
│ ├── process_signup.php         # Registration processing
│ ├── logout.php                 # Logout handling
│-- styles/
│ ├── styles.css                 # Main styles
│ ├── dashboard.css              # Dashboard specific styles
```

## Technologies Used
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Font Awesome Icons

## Theme System
The application includes a theme switching system that:
- Toggles between dark and light modes
- Persists user preference using cookies
- Maintains theme across sessions
- Provides smooth visual transitions


## License
This project is open-source and available under the MIT License.