Requirements: php 8.1, Composer

Step 1: Begin by creating a .env file and configuring the database settings. Include the following parameters: DB_CONNECTION=mysql, DB_PORT=3306, DB_USERNAME=task, and DB_PASSWORD=root.

Step 2: Execute the command [php artisan migrate] to initiate the creation of database tables.

Step 3: Launch the local development server by running the command [php artisan serve].
Step 4: Open your web browser and enter either http://localhost:8000 or http://127.0.0.1:8000 in the address bar, then press Enter to access the local server.
Step 5: Proceed to the registration section and create a new account by clicking on the "Register" option. Follow the registration process to set up your account.
Step 6: Navigate to the dashboard page, select the "Admin" option, and subsequently click on "Show News Table." This action triggers an API request to fetch and display the data stored in the database, presenting it in a user-friendly datatable format.