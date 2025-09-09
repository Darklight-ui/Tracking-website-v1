<?php
// setup/install.php - Database Setup Script
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftTrack Installation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-4xl w-full">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center space-x-2 mb-4">
                        <i class="fas fa-shipping-fast text-blue-600 text-4xl"></i>
                        <span class="text-3xl font-bold text-gray-800">SwiftTrack</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Installation & Setup</h1>
                    <p class="text-gray-600 mt-2">Set up your parcel tracking system</p>
                </div>

                <?php
                $installation_complete = false;
                $error_message = '';
                $success_message = '';

                if ($_POST && isset($_POST['install'])) {
                    try {
                        // Database connection details from form
                        $host = $_POST['db_host'];
                        $username = $_POST['db_username'];
                        $password = $_POST['db_password'];
                        $database = $_POST['db_name'];

                        // Create connection
                        $conn = new PDO("mysql:host=$host", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Create database
                        $conn->exec("CREATE DATABASE IF NOT EXISTS `$database`");
                        $conn->exec("USE `$database`");

                        // Create tables
                        $tables_sql = "
                        CREATE TABLE IF NOT EXISTS users (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            username VARCHAR(50) UNIQUE NOT NULL,
                            password VARCHAR(255) NOT NULL,
                            role ENUM('admin', 'staff') DEFAULT 'admin',
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        );

                        CREATE TABLE IF NOT EXISTS parcels (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            tracking_number VARCHAR(20) UNIQUE NOT NULL,
                            sender_name VARCHAR(100) NOT NULL,
                            receiver_name VARCHAR(100) NOT NULL,
                            origin VARCHAR(100) NOT NULL,
                            destination VARCHAR(100) NOT NULL,
                            status ENUM('Pending', 'In Transit', 'Out for Delivery', 'Delivered') DEFAULT 'Pending',
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        );";

                        $conn->exec($tables_sql);

                        // Insert default admin user (password: admin123)
                        $admin_sql = "INSERT IGNORE INTO users (username, password, role) VALUES ('admin', '$2y$10\$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin')";
                        $conn->exec($admin_sql);

                        // Insert sample parcel data
                        $sample_data = "
                        INSERT IGNORE INTO parcels (tracking_number, sender_name, receiver_name, origin, destination, status) VALUES
                        ('TRK67890DEMO', 'John Smith', 'Jane Doe', 'New York, NY', 'Los Angeles, CA', 'In Transit'),
                        ('TRK12345TEST', 'Alice Johnson', 'Bob Wilson', 'Chicago, IL', 'Miami, FL', 'Out for Delivery'),
                        ('TRK54321SAMPLE', 'Sarah Davis', 'Mike Brown', 'Seattle, WA', 'Boston, MA', 'Delivered'),
                        ('TRK98765EXAMPLE', 'Tom Garcia', 'Lisa Martinez', 'Phoenix, AZ', 'Denver, CO', 'Pending'),
                        ('TRK11111DEMO', 'Chris Taylor', 'Emma Anderson', 'Houston, TX', 'Atlanta, GA', 'In Transit');";

                        $conn->exec($sample_data);

                        // Update config file
                        $config_content = "<?php
// config/database.php - Database Configuration (Auto-generated)
class Database {
    private \$host = \"$host\";
    private \$db_name = \"$database\";
    private \$username = \"$username\";
    private \$password = \"$password\";
    public \$conn;

    public function getConnection() {
        \$this->conn = null;
        try {
            \$this->conn = new PDO(\"mysql:host=\" . \$this->host . \";dbname=\" . \$this->db_name, \$this->username, \$this->password);
            \$this->conn->exec(\"set names utf8\");
        } catch(PDOException \$exception) {
            echo \"Connection error: \" . \$exception->getMessage();
        }
        return \$this->conn;
    }
}
?>";

                        // Create config directory and file
                        if (!file_exists('../config')) {
                            mkdir('../config', 0755, true);
                        }
                        file_put_contents('../config/database.php', $config_content);

                        $installation_complete = true;
                        $success_message = "Installation completed successfully! You can now use your parcel tracking system.";

                    } catch (PDOException $e) {
                        $error_message = "Database error: " . $e->getMessage();
                    } catch (Exception $e) {
                        $error_message = "Installation error: " . $e->getMessage();
                    }
                }
                ?>

                <?php if ($error_message): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <?php if ($success_message): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-check-circle mr-2"></i>
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>

                <?php if (!$installation_complete): ?>
                    <!-- Installation Form -->
                    <form method="POST" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Database Host</label>
                                <input type="text" name="db_host" value="localhost" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>
                        
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Database Name</label>
                                <input type="text" name="db_name" value="parcel_tracking" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>
                        
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Database Username</label>
                                <input type="text" name="db_username" value="root" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>
                        
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Database Password</label>
                                <input type="password" name="db_password" value=""
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-blue-800 mb-2">What will be installed:</h3>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Database tables for users and parcels</li>
                                <li>• Default admin user (username: admin, password: admin123)</li>
                                <li>• Sample parcel data for testing</li>
                                <li>• Database configuration file</li>
                            </ul>
                        </div>
                    
                        <button type="submit" name="install" 
                                class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 font-semibold">
                            <i class="fas fa-download mr-2"></i>Install SwiftTrack
                        </button>
                    </form>
                <?php else: ?>
                    <!-- Installation Complete -->
                    <div class="text-center space-y-6">
                        <div class="bg-green-50 p-8 rounded-lg">
                            <i class="fas fa-check-circle text-green-600 text-6xl mb-4"></i>
                            <h2 class="text-2xl font-bold text-green-800 mb-2">Installation Complete!</h2>
                            <p class="text-green-700">Your parcel tracking system is ready to use.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="font-semibold text-gray-800 mb-3">Admin Access</h3>
                                <p class="text-gray-600 mb-3">Use these credentials to log in:</p>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span>Username:</span>
                                        <code class="bg-white px-2 py-1 rounded">admin</code>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Password:</span>
                                        <code class="bg-white px-2 py-1 rounded">admin123</code>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="font-semibold text-gray-800 mb-3">Sample Tracking Numbers</h3>
                                <p class="text-gray-600 mb-3">Test the system with these:</p>
                                <div class="space-y-1 text-sm">
                                    <code class="bg-white px-2 py-1 rounded block">TRK67890DEMO</code>
                                    <code class="bg-white px-2 py-1 rounded block">TRK12345TEST</code>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="../index.php" 
                               class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-semibold">
                                <i class="fas fa-home mr-2"></i>Go to Website
                            </a>
                            <a href="../admin/login.php" 
                               class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 font-semibold">
                                <i class="fas fa-user-shield mr-2"></i>Admin Login
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!$installation_complete): ?>
                    <!-- Requirements Check -->
                    <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-gray-800 mb-4">System Requirements</h3>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <i class="fas fa-<?php echo version_compare(PHP_VERSION, '7.4.0', '>=') ? 'check text-green-600' : 'times text-red-600'; ?> mr-2"></i>
                                    PHP 7.4+ (Current: <?php echo PHP_VERSION; ?>)
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-<?php echo extension_loaded('pdo') ? 'check text-green-600' : 'times text-red-600'; ?> mr-2"></i>
                                    PDO Extension
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-<?php echo extension_loaded('pdo_mysql') ? 'check text-green-600' : 'times text-red-600'; ?> mr-2"></i>
                                    PDO MySQL Extension
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <i class="fas fa-<?php echo is_writable('.') ? 'check text-green-600' : 'times text-red-600'; ?> mr-2"></i>
                                    Write Permissions
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-600 mr-2"></i>
                                    MySQL Database
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-600 mr-2"></i>
                                    Web Server
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>