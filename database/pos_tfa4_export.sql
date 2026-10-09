CREATE DATABASE IF NOT EXISTS pos_tfa4;
USE pos_tfa4;

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
  password VARCHAR(255) NOT NULL,
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

INSERT INTO users (username, password, full_name, avatar, created_at) VALUES
  ('jdelacruz', '$2y$10$PEo4gZH/gB3Jj2L6rwJco.gDmk6d5wGsP3q2HHaghShrE2z9FoChe', 'Jamie Dela Cruz', NULL, '2026-09-01 10:00:00'),
  ('rlopez', '$2y$10$5EFgP3H0uRqGNgIAMJSVKOyE1znlGMYuLjbnry92TsywQzTTUjLpq', 'Rina Lopez', NULL, '2026-09-01 10:05:00'),
  ('mrivera', '$2y$10$j9MAaoH2Lhp/UWL9yX9Ffe8DpoFAbiPmzeLI/LqoYzfSxRpN20Dmu', 'Miguel Rivera', NULL, '2026-09-01 10:10:00'),
  ('tlim', '$2y$10$K7S/142PDbXjK5PlDWunDeIthXlOJYx4EcDyvV61PZn3TWNVAtoJm', 'Tessa Lim', NULL, '2026-09-01 10:15:00'),
  ('aperez', '$2y$10$foDTHXh4FRRc2lKtyaWEqeQytUWPMIyVCn9AaTjzL3Rsi0whxhfp6', 'Alex Perez', NULL, '2026-09-01 10:20:00');
