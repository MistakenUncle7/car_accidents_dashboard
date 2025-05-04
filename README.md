# Road Accidents Dashboard

The **Road Accidents Dashboard** is a web-based application designed to visualize and analyze road accident data. It provides an interactive interface for filtering data and dynamically updating statistics, charts, and graphs to help users gain insights into accident trends.

## Features

- **Dynamic Filters**: Filter data by country, year, month, driver gender, accident severity, and road type.
- **Interactive Cards**: Display key statistics such as total accidents, fatalities, economic loss, and insurance claims.
- **Charts and Graphs**: Visualize data trends, including:
  - Top countries with the most accidents.
  - Most common accident causes.
  - Number of cars involved in accidents.
  - Accidents over time.
- **Responsive Design**: Optimized for various screen sizes using CSS Grid and Bootstrap.

### Key Files

- **`index.php`**: Main entry point for the dashboard.
- **`assets/css/stylesheet.css`**: Contains styles for the dashboard layout and components.
- **`assets/js/scripts.js`**: Handles form interactions and updates the dashboard dynamically.
- **`assets/js/graphs.js`**: Manages the creation and updating of charts using Chart.js.
- **`assets/php/connection.php`**: Establishes a connection to the MySQL database.
- **`assets/php/select.php`**: Provides helper functions for populating dropdown filters.
- **`assets/php/cards.php`**: Fetches data for the statistics cards.
- **`assets/php/graphs.php`**: Fetches data for the charts and graphs.

## Prerequisites

- **Web Server**: Apache or similar.
- **PHP**: Version 7.4 or higher.
- **MySQL**: Database server with the `car_accidents` database imported from `assets/db/car_accidents-db_2025-05-03.sql`.
- **Node.js** (optional): For managing dependencies like Chart.js.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/car_accidents_dashboard.git```
2. Import the database:
   - Open your MySQL client or phpMyAdmin.
   - Import the SQL file located at `assets/db/car_accidents-db_2025-05-03.sql`.

3. Configure the database connection:
   - Edit `assets/php/connection.php` to match your database credentials.

4. Start your web server and navigate to the project directory.

5. Open the dashboard in your browser: http://localhost/car_accidents_dashboard/index.php