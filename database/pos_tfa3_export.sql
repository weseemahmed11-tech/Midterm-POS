CREATE DATABASE IF NOT EXISTS pos_tfa3;
USE pos_tfa3;

CREATE TABLE customers (
  id INT NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20) DEFAULT NULL,
  created_at DATETIME NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  full_name VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) DEFAULT NULL,
  created_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO customers (full_name, email, phone, created_at) VALUES
  ('Ana Reyes', 'ana.reyes@example.com', '09170000001', '2026-09-01 09:00:00'),
  ('Marco Santos', 'marco.santos@example.com', '09170000002', '2026-09-01 09:05:00'),
  ('Liza Cruz', 'liza.cruz@example.com', '09170000003', '2026-09-01 09:10:00'),
  ('Paolo Garcia', 'paolo.garcia@example.com', '09170000004', '2026-09-01 09:15:00'),
  ('Mina Flores', 'mina.flores@example.com', '09170000005', '2026-09-01 09:20:00');

INSERT INTO users (username, full_name, avatar, created_at) VALUES
  ('jdelacruz', 'Jamie Dela Cruz', NULL, '2026-09-01 10:00:00'),
  ('rlopez', 'Rina Lopez', NULL, '2026-09-01 10:05:00'),
  ('mrivera', 'Miguel Rivera', NULL, '2026-09-01 10:10:00'),
  ('tlim', 'Tessa Lim', NULL, '2026-09-01 10:15:00'),
  ('aperez', 'Alex Perez', NULL, '2026-09-01 10:20:00');
