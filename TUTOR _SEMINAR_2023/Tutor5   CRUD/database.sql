- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS demo_database;
USE demo_database;
-- Tạo bảng genres
CREATE TABLE IF NOT EXISTS genres (
    genre_id INT AUTO_INCREMENT PRIMARY KEY,
    genre_name VARCHAR(255) NOT NULL
);
-- Tạo bảng movies
CREATE TABLE IF NOT EXISTS movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    poster VARCHAR(255),
    overview TEXT,
    release_date DATE,
    genre_id INT,
    FOREIGN KEY (genre_id) REFERENCES genres(genre_id)
);
-- Thêm dữ liệu vào bảng genres
INSERT INTO genres (genre_name) VALUES
    ('Action'),
    ('Drama'),
    ('Comedy'),
    ('Science Fiction'),
    ('Horror');
-- Thêm dữ liệu vào bảng movies
INSERT INTO movies (title, poster, overview, release_date, genre_id) VALUES
    ('Movie 1', 'poster1.jpg', 'Overview of Movie 1', '2023-01-15', 1),
    ('Movie 2', 'poster2.jpg', 'Overview of Movie 2', '2023-02-28', 2),
    ('Movie 3', 'poster3.jpg', 'Overview of Movie 3', '2023-03-10', 3);

Cho cơ sở dữ liệu gồm các bảng sau:- genres(genre_id, genre_name)- movies(movie_id, title, poster, overview, release_date, genre_id)Thực hiện chức năng Thêm, sửa, xóa, hiển thị dữ liệu