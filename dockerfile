# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Salin semua file dari folder TugasCRUD ke direktori /var/www/html di dalam container
COPY TugasCRUD/ /var/www/html

# Install ekstensi PHP untuk MySQL
RUN docker-php-ext-install mysqli

# Memberikan izin pada file dan folder aplikasi
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Ekspos port 80 agar bisa diakses dari luar container
EXPOSE 80
