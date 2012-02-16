CREATE DATABASE betabud;
CREATE USER 'betabud'@'%' IDENTIFIED BY 'betabud';
CREATE USER 'betabud'@'localhost' IDENTIFIED BY 'betabud';
GRANT ALL PRIVILEGES ON betabud.* TO 'betabud'@'%';
GRANT ALL PRIVILEGES ON betabud.* TO 'betabud'@'localhost';
FLUSH PRIVILEGES;
