# Laravel Blog Project

## Getting Started

To download and set up this project from GitHub, follow the steps below:

1. **Clone the Repository**  
   Copy the repository link by clicking on the **Code** button, then select **HTTPS**.

```bash
  git clone <repository-url>
```

2. **Navigate to the Project Folder**

After cloning, navigate to the project folder:

```bash
cd <project-folder>
```

3. **Install Dependencies**

Run the following commands to install all required dependencies

```bash
composer install
```

```bash
npm install
```

4. **Set Up Environment Variables**

Copy the example environment file and rename it to .env:

```bash
copy .env.example .env
```

Open the .env file and update the necessary configurations, such as database settings.

5. **Seed the Database**

```bash
php artisan migrate:fresh --seed
```

6. **Run the Application**

```bash
npm run dev
```

if the project requires additional setup, follow any provided documentation for further instructions
