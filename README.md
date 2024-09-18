# Smart Farm Management System

## Project Overview

This project is a Smart Farm Management System built using Laravel and Vue.js. It provides a comprehensive solution for managing and monitoring various aspects of a farm, including sensor data, task management, and farm operations.

## Technologies Used

- **Backend Framework**: Laravel 10.x
- **Frontend Framework**: Vue.js 3.x
- **Database**: MySQL
- **Authentication**: Laravel Sanctum

## Key Features

1. Sensor Data Management
   - Real-time monitoring of various sensors (TDS, humidity, light, soil moisture, temperature)
   - Historical data analysis and averages

2. Farm Management
   - Farm registration and details
   - Sensor association with farms

3. Task Management
   - Create, update, and track farm-related tasks
   - Task status updates and revision requests

4. User Management
   - User authentication and authorization
   - Profile management and password updates

5. Notifications
   - Real-time notifications for important farm events

6. Farm Operations
   - Logging and tracking of farm operations
   - Historical view of operations

## API and Sensor Input

### API Structure

The API is structured to handle various aspects of farm management:

1. Sensor Data API:
   - Endpoints for registering new sensors
   - Routes for inputting sensor readings
   - APIs for retrieving sensor data (live and historical)

2. Farm Management API:
   - CRUD operations for farms
   - Endpoint for retrieving single farm data with associated sensors

3. Task Management API:
   - Endpoints for creating, updating, and retrieving tasks
   - Task status update functionality

4. User Management API:
   - Authentication endpoints (login, logout)
   - Profile update and password change routes

5. Farm Operations API:
   - Endpoints for logging and retrieving farm operations

### Sensor Input

The system supports various types of sensors:

- TDS (Total Dissolved Solids)
- Humidity
- Light
- Soil Moisture
- Temperature

Each sensor type has dedicated routes for:
- Registration: `/sensors-inputs/registration/{sensor-type}`
- Reading input: `/sensors-inputs/register-sensor-readings/{sensor-type}`

The system also provides endpoints for:
- Retrieving average sensor readings over a week
- Getting live sensor data with optional limits

## Getting Started

1. Clone the repository
2. Install dependencies:
   ```
   composer install
   npm install
   ```
3. Set up your environment variables in `.env`
4. Run migrations:
   ```
   php artisan migrate
   ```
5. Start the development server:
   ```
   php artisan serve
   npm run dev
   ```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Admin Dashboard

The admin dashboard is now available and can be accessed at https://app.cropsense.xyz. This dashboard provides administrators with powerful tools to manage and monitor the entire CropSense system.

Key features of the admin dashboard include:

1. User Management:
   - View and manage all user accounts
   - Create new admin accounts
   - Disable or enable user access

2. Farm Oversight:
   - Monitor all registered farms
   - View detailed farm statistics and sensor data
   - Manage farm groupings and assignments

3. Sensor Management:
   - Register new sensors
   - Monitor sensor health and status
   - Configure sensor thresholds and alerts

4. Data Analytics:
   - Access comprehensive data visualizations
   - Generate reports on farm performance
   - Analyze trends in crop health and yield

5. System Configuration:
   - Adjust global system settings
   - Manage API access and security
   - Configure notification preferences

To access the admin dashboard, authorized personnel should navigate to https://app.cropsense.xyz and log in with their admin credentials. For security reasons, admin access is strictly controlled and monitored.

Note: The admin dashboard is separate from the main application and has enhanced security measures in place to protect sensitive data and system controls.

# cropsense
# cropsense
# cropsense-admin
