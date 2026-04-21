CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    location_id INT,
    image_url VARCHAR(500),
    duration_minutes INT,
    is_active BOOLEAN DEFAULT TRUE,
    stock INT DEFAULT 0,
    INDEX idx_category_id (category_id),
    INDEX idx_location_id (location_id),
    INDEX idx_slug (slug),
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;