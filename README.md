# SwiftTrack - Professional Parcel Tracking System

A complete web-based parcel tracking system built with PHP, MySQL, and TailwindCSS.

## 🚀 Features

### Customer Features

- **Real-time Parcel Tracking**: Track packages using tracking numbers
- **Visual Progress Bar**: See delivery stages with status indicators
- **Responsive Design**: Works perfectly on desktop and mobile devices
- **Search Functionality**: Quick tracking number search
- **Multiple Pages**: Home, Services, Track, Contact pages

### Admin Features

- **Secure Admin Panel**: Login-protected administration area
- **Dashboard**: Overview statistics and recent parcels
- **Parcel Management**: Add, edit, delete, and search parcels
- **Status Updates**: Update parcel status and tracking information
- **User Management**: Admin account management

### Technical Features

- **Secure Authentication**: Password hashing and session management
- **Database Abstraction**: PDO for secure database operations
- **Modern UI**: TailwindCSS for responsive, professional design
- **Error Handling**: Comprehensive error handling and validation
- **Sample Data**: Pre-loaded demo data for testing

## 📋 Requirements

- **PHP**: 7.4 or higher
- **MySQL**: 5.7 or higher
- **Web Server**: Apache/Nginx
- **Extensions**: PDO, PDO MySQL

## 🛠️ Installation

### Method 1: Quick Setup (Recommended)

1. **Upload Files**: Extract and upload all files to your web server
2. **Run Installer**: Navigate to `setup/install.php` in your browser
3. **Enter Credentials**: Provide your database connection details
4. **Complete Setup**: Click "Install SwiftTrack" and wait for completion
5. **Done**: Your system is ready to use!

### Method 2: Manual Installation

1. **Create Database**:

```sql
CREATE DATABASE parcel_tracking;
```

2. **Import SQL**: Run the SQL commands from `database-setup.sql`

3. **Configure Database**: Edit `config/database.php` with your credentials:

```php
private $host = "localhost";
private $db_name = "parcel_tracking";
private $username = "your_username";
private $password = "your_password";
```

## 📁 File Structure

```
SwiftTrack/
├── index.php                 # Homepage
├── track.php                 # Tracking page
├── services.php              # Services page
├── contact.php               # Contact page
├── config/
│   ├── database.php          # Database configuration
│   └── session.php           # Session management
├── classes/
│   ├── Parcel.php            # Parcel management class
│   └── User.php              # User management class
├── admin/
│   ├── login.php             # Admin login
│   ├── dashboard.php         # Admin dashboard
│   ├── parcels.php           # Parcel management
│   └── logout.php            # Admin logout
└── setup/
    └── install.php           # Installation wizard
```

## 🔐 Default Credentials

### Admin Access

- **Username**: `admin`
- **Password**: `admin123`

### Demo Tracking Numbers

- `TRK67890DEMO` (In Transit)
- `TRK12345TEST` (Out for Delivery)
- `TRK54321SAMPLE` (Delivered)
- `TRK98765EXAMPLE` (Pending)

## 📊 Database Schema

### Users Table

| Column     | Type         | Description      |
| ---------- | ------------ | ---------------- |
| id         | INT          | Primary key      |
| username   | VARCHAR(50)  | Unique username  |
| password   | VARCHAR(255) | Hashed password  |
| role       | ENUM         | admin/staff role |
| created_at | TIMESTAMP    | Account creation |

### Parcels Table

| Column          | Type         | Description        |
| --------------- | ------------ | ------------------ |
| id              | INT          | Primary key        |
| tracking_number | VARCHAR(20)  | Unique tracking ID |
| sender_name     | VARCHAR(100) | Sender's name      |
| receiver_name   | VARCHAR(100) | Receiver's name    |
| origin          | VARCHAR(100) | Pickup location    |
| destination     | VARCHAR(100) | Delivery location  |
| status          | ENUM         | Parcel status      |
| created_at      | TIMESTAMP    | Creation time      |
| last_update     | TIMESTAMP    | Last modification  |

## 🎯 Usage Guide

### For Customers

1. **Visit Homepage**: Access the main website
2. **Track Parcel**: Enter tracking number in search form
3. **View Progress**: See real-time status and progress bar
4. **Contact Support**: Use contact form for inquiries

### For Administrators

1. **Login**: Access `/admin/login.php`
2. **Dashboard**: View system overview and statistics
3. **Add Parcels**: Create new parcel entries with auto-generated tracking
4. **Update Status**: Change parcel status to reflect current state
5. **Search/Filter**: Find specific parcels using various criteria

## 🔧 Customization

### Adding New Status Types

```sql
ALTER TABLE parcels
MODIFY status ENUM('Pending', 'In Transit', 'Out for Delivery', 'Delivered', 'Custom Status');
```

### Modifying Colors

Edit the status color classes in the PHP files:

```php
case 'Custom Status': echo 'bg-purple-100 text-purple-800'; break;
```

### Adding Features

- **Email Notifications**: Integrate with PHPMailer or similar
- **SMS Alerts**: Add SMS gateway integration
- **QR Codes**: Generate QR codes for tracking numbers
- **API Endpoints**: Create REST API for mobile apps

## 🛡️ Security Features

- **Password Hashing**: Bcrypt for secure password storage
- **Session Management**: Secure session handling
- **Input Validation**: Form input sanitization
- **SQL Injection Prevention**: PDO prepared statements
- **Authentication Guards**: Protected admin areas

## 🔍 Troubleshooting

### Common Issues

**Database Connection Failed**

- Check credentials in `config/database.php`
- Ensure MySQL server is running
- Verify database exists

**Login Issues**

- Use default credentials: `admin` / `admin123`
- Clear browser cache and cookies
- Check if users table exists

**Tracking Not Working**

- Use sample tracking numbers
- Verify parcels table has data
- Check for typos in tracking number

**Permission Denied**

- Set proper file permissions (755 for directories, 644 for files)
- Ensure web server can write to config directory

### Getting Help

1. Check PHP error logs
2. Verify database connection
3. Ensure all required extensions are installed
4. Review file permissions

## 📈 Performance Tips

- **Database Indexing**: Add indexes on frequently searched columns
- **Caching**: Implement caching for dashboard statistics
- **Optimization**: Optimize SQL queries for large datasets
- **CDN**: Use CDN for static assets in production

## 🌟 Future Enhancements

### Planned Features

- **Multi-language Support**: Internationalization
- **Advanced Analytics**: Detailed reporting and charts
- **Mobile App**: Native iOS/Android applications
- **API Documentation**: Complete REST API
- **Webhook Integration**: Real-time notifications
- **Bulk Import**: CSV import functionality

### Integration Ideas

- **Payment Gateways**: Online payment processing
- **Shipping APIs**: Integration with carriers
- **Inventory Management**: Stock tracking
- **Customer Accounts**: User registration system

## 📄 License

This project is open source and available under the MIT License.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 💬 Support

For support and questions:

- Create an issue on GitHub
- Check the troubleshooting section
- Review the documentation

---

**SwiftTrack** - Making parcel tracking simple, secure, and efficient! 📦✨
