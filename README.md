# LuxeMarket - Premium Marketplace Platform

## Overview
LuxeMarket is a premium marketplace platform that connects buyers and sellers of exceptional products. This project has been updated to fix critical issues with user registration and live chat functionality.

## Issues Fixed

### 1. User Registration System
- **Problem**: Missing `register.php` file that processed user registration
- **Solution**: Created comprehensive registration system with:
  - Form validation and error handling
  - Support for both buyer and seller roles
  - Database and file-based storage options
  - Password hashing and security
  - Session management

### 2. User Authentication System
- **Problem**: Missing `login.php` file for user authentication
- **Solution**: Created secure login system with:
  - Email/password authentication
  - Session management
  - Redirect handling
  - Error handling and validation

### 3. Live Chat System
- **Problem**: Broken chat functionality with missing backend files
- **Solution**: Implemented comprehensive chat system:
  - Real-time messaging between users
  - Admin contact form
  - File-based and database storage options
  - Message persistence and retrieval
  - Auto-refresh functionality

### 4. Session Management
- **Problem**: No logout functionality
- **Solution**: Created `logout.php` with proper session cleanup

## Features

### User Management
- User registration (Buyer/Seller roles)
- Secure login/logout
- Session management
- Role-based access control

### Chat System
- Real-time messaging between users
- Admin contact form
- Message persistence
- Auto-refresh functionality
- File-based storage (fallback)

### Security Features
- Password hashing using PHP's built-in functions
- Input validation and sanitization
- Session security
- CSRF protection considerations

## File Structure

```
luxe/
├── index.php                 # Homepage
├── signup.php               # User registration form
├── register.php             # Registration processing
├── login.php                # User login
├── logout.php               # User logout
├── contact.php              # Admin contact form
├── browse.php               # Product browsing
├── product-detail.php       # Product details
├── seller-dashboard.php     # Seller dashboard
├── seller-add-product.php   # Add product form
├── admin-panel.php          # Admin panel
├── admin-dashboard.php      # Admin dashboard
├── backend/                 # Backend files
│   ├── chat_system.php      # Chat system backend
│   ├── contact_admin.php    # Admin contact handler
│   └── get_admin_messages.php # Message retrieval
├── luxe-style.css           # Main stylesheet
├── luxe-script.js           # Main JavaScript
├── database_setup.sql       # Database schema
└── README.md                # This file
```

## Setup Instructions

### Option 1: File-Based Storage (Quick Start)
1. Upload all files to your web server
2. Ensure PHP is installed and configured
3. Make sure the `backend/` directory is writable
4. Access the site through your web browser

### Option 2: Database Setup (Recommended for Production)
1. Create a MySQL database
2. Import `database_setup.sql` to create tables
3. Update database credentials in PHP files:
   ```php
   $host = 'your_host';
   $dbname = 'your_database_name';
   $username = 'your_username';
   $password = 'your_password';
   ```
4. Upload files to web server
5. Test the system

## Sample Users (Database Setup)

After running the database setup, you can use these test accounts:

- **Admin**: admin@luxemarket.com / admin123
- **Seller**: seller@luxemarket.com / seller123  
- **Buyer**: buyer@luxemarket.com / buyer123

## Chat System Features

### User-to-User Chat
- Real-time messaging between buyers and sellers
- Message persistence
- Read status tracking
- Chat history

### Admin Contact Form
- Users can send messages to admin
- Message storage and retrieval
- Auto-refresh every 10 seconds
- Anonymous user support

## Security Considerations

- All passwords are hashed using PHP's `password_hash()` function
- Input validation and sanitization implemented
- Session management with proper cleanup
- SQL injection protection with prepared statements
- XSS protection with HTML escaping

## Browser Compatibility

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Responsive design for mobile devices
- JavaScript required for chat functionality

## Dependencies

- PHP 7.4+ (recommended 8.0+)
- MySQL 5.7+ or MariaDB 10.2+
- Web server (Apache/Nginx)
- Modern web browser with JavaScript enabled

## Troubleshooting

### Common Issues

1. **Chat not working**: Check if `backend/` directory is writable
2. **Registration fails**: Verify PHP has write permissions for file storage
3. **Database connection error**: Check database credentials and connection
4. **Session issues**: Ensure PHP sessions are enabled

### File Permissions
```bash
chmod 755 luxe/
chmod 755 luxe/backend/
chmod 644 luxe/*.php
chmod 644 luxe/backend/*.php
```

## Development Notes

- The system gracefully falls back to file-based storage if database is unavailable
- All chat messages are stored in JSON files when database is not used
- User data is stored in `users.json` for file-based storage
- Admin messages are stored in `admin_messages.json`

## Future Enhancements

- Real-time WebSocket chat
- Push notifications
- File/image sharing in chat
- Advanced user profiles
- Payment integration
- Email verification system
- Two-factor authentication

## Support

For technical support or questions about the implementation, please refer to the code comments or create an issue in the repository.

## License

This project is confidential and proprietary. All rights reserved.
