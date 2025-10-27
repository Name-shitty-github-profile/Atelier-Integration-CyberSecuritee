# Marché local de saint-tite - Web Application

## Overview
A Facebook-inspired web application for "Marché local de saint-tite" with user authentication and password management functionality. Built with PHP 8.2 and SQLite database. Features a blue Facebook-style header and modern UI design.

## Recent Changes
- 2025-10-27: Initial project setup with PHP 8.2
- 2025-10-27: Implemented role-based access control for admin dashboard
- 2025-10-27: Added user.php for regular user dashboard
- 2025-10-27: Introduced intentional SQL injection vulnerability on forgot.php for educational purposes
- 2025-10-27: Expanded database to 20 users
- 2025-10-27: Added download functionality for passwords (forgot.php) and all users (admin.php)
- 2025-10-27: Removed authentication from admin page for security challenge
- 2025-10-27: Redesigned UI with Facebook-inspired theme (blue header, modern styling)
- 2025-10-27: Rebranded to "Marché local de saint-tite"

## Project Architecture
- **Backend**: PHP 8.2 with built-in server
- **Database**: SQLite3 for user data storage
- **Session Management**: PHP sessions for authentication
- **Frontend**: HTML5, CSS3, Vanilla JavaScript

## Features
1. **Login Page** (index.php) - User authentication with role-based routing
2. **Password Recovery** (forgot.php) - Displays password when username is entered, with download option for multiple results
3. **Admin Dashboard** (admin.php) - Shows all users and passwords (admin-only) with CSV export
4. **User Dashboard** (user.php) - Regular user landing page
5. **Download Functionality** (download.php) - Export passwords (TXT) or all users (CSV)

## Project Structure
```
/
├── index.php          # Login page with role-based routing
├── forgot.php         # Password recovery page with download
├── admin.php          # Admin dashboard (admin-only) with CSV export
├── user.php           # User dashboard (regular users)
├── logout.php         # Logout handler
├── download.php       # Download handler for passwords/users
├── db.php             # Database connection
├── init_db.php        # Database initialization
├── style.css          # Shared stylesheet
└── users.db           # SQLite database (generated)
```

## Database Schema
- **users** table: id, username, password, is_admin, created_at

## Security Notes
- Current MVP stores passwords in plain text (as requested)
- **INTENTIONAL VULNERABILITIES** (for educational purposes):
  1. **SQL Injection on forgot.php**: Students can use injections like `" OR 1=1 --` or `" OR "1"="1` to retrieve all passwords
     - SQLite-specific injection patterns work (uses double quotes in query)
     - When exploited, displays only passwords (not usernames) for added challenge
  2. **No Authentication on Admin Page**: admin.php can be accessed directly without logging in (/admin.php)
     - Anyone can view all usernames and passwords
     - No session or authentication checks
     - Download functionality also unrestricted
- Recommended for next phase: Implement password hashing and proper authentication

## Sample Users
Database contains 20 users total:
- **admin** / admin123 (Administrator)
- **john** / password123
- **marie** / marie2024
- **pierre** / pierre456
- **sophie** / sophie789
- **luc** / luc2025
- **amelie** / amelie555
- **thomas** / thomas999
- **claire** / claire2024
- **marc** / marc888
- **julie** / julie777
- **alexandre** / alex2024
- **camille** / camille456
- **nicolas** / nico123
- **isabelle** / isa2025
- **francois** / francois321
- **catherine** / cat2024
- **david** / david456
- **emma** / emma789
- **lucas** / lucas2025
