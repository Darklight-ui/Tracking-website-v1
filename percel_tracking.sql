-- Database Setup SQL
-- Create database and tables for SwiftTrack Parcel Tracking System

CREATE DATABASE parcel_tracking;
USE parcel_tracking;

-- Users table for admin authentication
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Parcels table for tracking information
CREATE TABLE parcels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tracking_number VARCHAR(20) UNIQUE NOT NULL,
    sender_name VARCHAR(100) NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    origin VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    status ENUM('Pending', 'In Transit', 'Out for Delivery', 'Delivered') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default admin user (username: admin, password: admin123)
INSERT INTO users (username, password, role) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Insert sample parcel data for testing
INSERT INTO parcels (tracking_number, sender_name, receiver_name, origin, destination, status) VALUES
('TRK67890DEMO', 'John Smith', 'Jane Doe', 'New York, NY', 'Los Angeles, CA', 'In Transit'),
('TRK12345TEST', 'Alice Johnson', 'Bob Wilson', 'Chicago, IL', 'Miami, FL', 'Out for Delivery'),
('TRK54321SAMPLE', 'Sarah Davis', 'Mike Brown', 'Seattle, WA', 'Boston, MA', 'Delivered'),
('TRK98765EXAMPLE', 'Tom Garcia', 'Lisa Martinez', 'Phoenix, AZ', 'Denver, CO', 'Pending'),
('TRK11111DEMO', 'Chris Taylor', 'Emma Anderson', 'Houston, TX', 'Atlanta, GA', 'In Transit');