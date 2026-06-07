-- Create Database
CREATE DATABASE IF NOT EXISTS applicants_db;

-- Use the Database
USE applicants_db;

-- Create Applicants Table
CREATE TABLE applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL
);

-- Insert Sample Data (Optional)
INSERT INTO applicants (name, location, position) VALUES
('John Doe', 'New York', 'Software Developer'),
('Jane Smith', 'Los Angeles', 'UI Designer'),
('Mike Johnson', 'Chicago', 'Project Manager');
