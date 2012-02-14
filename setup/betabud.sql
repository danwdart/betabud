CREATE DATABASE betabud;
CREATE USER 'betabud'@'%' IDENTIFIED BY 'betabud';
GRANT ALL PRIVILEGES ON betabud.* TO 'betabud'@'%';
FLUSH PRIVILEGES;
