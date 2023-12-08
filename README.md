# Ecommerce Book Store Project

Welcome to the Ecommerce Book Store project, a web-based application for buying and selling books. This project is meticulously crafted using PHP and powered by the Laravel framework. Whether you're a book enthusiast looking for your next read or a bookseller looking to expand your business, this application provides a user-friendly and efficient platform for all your book-related needs.

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies](#technologies)
- [Contributing](#contributing)
- [License](#license)

## Features

1. **User Authentication**:
   - Secure user registration and login functionality.
   - google auth integration.
   - User profile management.

2. **Browse and Search Books**:
   - Browse a wide selection of books.
   - Use the search functionality to find specific titles, authors, or categories.

3. **Shopping Cart**:
   - Add books to your cart.
   - View and edit the cart contents.

4. **Checkout and Payment**:
   - Smooth and secure checkout process.
   - Support for various payment methods.

5. **Orders and History**:
   - View order history and status.

6. **Book Management (Admin)**:
   - Admin panel for adding, updating, and removing books, categories, subcategories, authors, publishers, etc.
   - Inventory management and tracking.

7. **Rating and Reviews**:
   - Users can rate and review books and write comments.

8. **Responsive Design**:
   - Mobile and tablet-friendly for on-the-go shopping.

## Installation

1. **Clone the repository**:
   ```shell
   git clone https://github.com/yourusername/ecommerce-bookstore.git
   ```

2. **Navigate to the project directory**:
   ```shell
   cd ecommerce-bookstore
   ```

3. **Install dependencies**:
   ```shell
   composer install
   ```

4. **Copy the `.env` file**:
   - Rename the `.env.example` file to `.env` and set up your database credentials and other environment settings.

5. **Generate application key**:
   ```shell
   php artisan key:generate
   ```

6. **Migrate the database**:
   ```shell
   php artisan migrate
   ```

7. **Seed the database (optional)**:
   - You can seed the database with sample data for testing purposes:
   ```shell
   php artisan db:seed
   ```

8. **Start the development server**:
   ```shell
   php artisan serve
   ```

9. **Access the application**:
   - Open your browser and navigate to `http://localhost:8000`

## Usage

- Visit the website, sign up, and start exploring or selling books.
- Use the admin panel at `http://localhost:8000/dashboard_book` for book management.

## Technologies

- PHP.
- Laravel Framework.
- MySQL.
- HTML/CSS.
- JavaScript.
- Bootstrap - Material UI (for styling).

## Contributing

Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and test them.
4. Submit a pull request.

## License

This project is licensed under the [Apache License](LICENSE).
