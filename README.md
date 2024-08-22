
# SwapShop - Student-to-Student Platform for Buying & Selling Study Materials

Welcome to **SwapShop**, the ultimate platform designed specifically for students to **buy** and **sell** textbooks and study materials with ease.

![SwapShop](https://github.com/user-attachments/assets/ddd78728-136b-462f-8b48-5f6cbf71fac8)

## About SwapShop

SwapShop is a cost-effective and convenient solution that empowers students to exchange study materials, helping each other save money while gaining access to essential resources. Whether you're looking to offload old textbooks or find affordable study materials for your next course, SwapShop makes it easy to connect with fellow students.

### Key Features

- **User Registration:** Sign up with your email to create an account, allowing you to browse and post listings.
- **Browse Listings:** Search for specific textbooks or materials, or filter by category, price, or location to find what you need.
- **Post Listings:** Easily list your textbooks or study materials for sale, including descriptions, prices, and photos.
- **Buy or Make Offers:** Purchase items directly or negotiate with sellers by making an offer.

## Getting Started

To get SwapShop up and running on your local machine, follow these steps:

### Prerequisites

- **XAMPP:** Ensure that XAMPP is installed on your machine. [Download XAMPP](https://www.apachefriends.org/index.html) if you don't have it installed.
- **PHP and MySQL:** XAMPP includes PHP and MySQL, which are required to run SwapShop.

### Project Setup

1. **Clone the Repository:**
   - Open your terminal or command prompt and navigate to the `htdocs` directory of your XAMPP installation:
     ```bash
     cd /path/to/xampp/htdocs
     ```
   - Clone the SwapShop repository from GitHub:
     ```bash
     git clone https://github.com/YourUsername/SwapShop.git
     ```

2. **Start XAMPP:**
   - Open the XAMPP control panel.
   - Start the **Apache** and **MySQL** services.

3. **Set Up the Database:**
   - Open [phpMyAdmin](http://localhost/phpmyadmin) in your browser.
   - Create a new database named `swapshop`.
   - Import the database schema:
     - Click on the `swapshop` database.
     - Click on the `Import` tab and select the SQL file located in the `database` folder of the SwapShop project (`swapshop.sql`).
     - Click `Go` to import the database structure.

4. **Access SwapShop:**
   - In your browser, navigate to `http://localhost/SwapShop/login.html` to start using SwapShop.

### Additional Configuration

- **Database Configuration:**
  - If you need to update the database connection settings, you can modify the configuration file located in the `config` directory (e.g., `config.php`) to match your database credentials.

## Contributing

If you'd like to contribute to SwapShop, feel free to fork the repository and submit a pull request. We welcome all improvements and bug fixes.

## Support

If you encounter any issues or have questions, please reach out to our support team at [support@swapshop.com](mailto:ganeshmohane5@gmail.com).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

**Happy swapping!** By connecting with fellow students on SwapShop, you'll not only save money but also help build a supportive academic community.