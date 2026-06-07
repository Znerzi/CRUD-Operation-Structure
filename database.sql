CREATE DATABASE IF NOT EXISTS applicants_db;

USE applicants_db;

CREATE TABLE applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL
);

INSERT INTO applicants (name, location, position) VALUES
('John Doe', 'New York', 'Software Developer'),
('Jane Smith', 'Los Angeles', 'UI Designer'),
('Mike Johnson', 'Chicago', 'Project Manager');
