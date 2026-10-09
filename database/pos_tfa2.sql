CREATE DATABASE IF NOT EXISTS pos_tfa2;
USE pos_tfa2;

CREATE TABLE customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  created_at DATETIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
  ('Ana Reyes', 'ana.reyes@example.com', '09170000001', '2026-09-01 09:00:00'),
  ('Marco Santos', 'marco.santos@example.com', '09170000002', '2026-09-01 09:05:00'),
  ('Liza Cruz', 'liza.cruz@example.com', '09170000003', '2026-09-01 09:10:00'),
  ('Paolo Garcia', 'paolo.garcia@example.com', '09170000004', '2026-09-01 09:15:00'),
  ('Mina Flores', 'mina.flores@example.com', '09170000005', '2026-09-01 09:20:00');

INSERT INTO users (username, full_name, created_at) VALUES
  ('jdelacruz', 'Jamie Dela Cruz', '2026-09-01 10:00:00'),
  ('rlopez', 'Rina Lopez', '2026-09-01 10:05:00'),
  ('mrivera', 'Miguel Rivera', '2026-09-01 10:10:00'),
  ('tlim', 'Tessa Lim', '2026-09-01 10:15:00'),
  ('aperez', 'Alex Perez', '2026-09-01 10:20:00');
