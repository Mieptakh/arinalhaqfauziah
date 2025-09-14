CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255)
);

INSERT INTO users (username, password) VALUES
('admin', MD5('admin123')); -- password demo, ubah di produksi!

CREATE TABLE links (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  url TEXT,
  color VARCHAR(50) DEFAULT 'btn-primary'
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  price INT,
  type VARCHAR(50),
  date DATE NULL,
  url TEXT
);
