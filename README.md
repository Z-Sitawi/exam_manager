<h1 align="center">Gestionnaire d'Examen</h1>

### Objectif :
- Utilisation des migrations pour la création et la gestion des structures de tables.
- Mise en place de seeders et de factories pour générer des données fictives dans la base
de données.
- Utilisation du Query Builder pour interroger la base de données de manière fluide et
performante.
- Implémentation de la pagination automatique et manuelle pour afficher efficacement les
résultats sous forme de pages.

### Les interfaces

![image](https://github.com/user-attachments/assets/087d1223-7709-4942-a416-3187fb83610e)

![image](https://github.com/user-attachments/assets/682b19fb-080d-430d-9af1-18e7a32f548a)

![Screenshot from 2025-03-30 17-06-18](https://github.com/user-attachments/assets/0371308c-9540-4f12-a575-019b62e718bb)

# Installation Instructions

Follow these steps to set up the application locally.

## 1. Clone the repository
Clone the project to your local machine using Git:
```bash
git clone https://github.com/Z-Sitawi/exam_manager.git
cd exam_manager
composer install

```

## 2. Copy the `.env` file
Copy the `.env.example` to `.env`:
```bash
cp .env.example .env
```

## 3. Generate the application key
Run the following command to generate the application key:
```bash
php artisan key:generate
```

## 4. Update `.env` file
Open the `.env` file and update the database settings:
```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password (optional)
```

## 5. Clear and cache config (optional but recommended)
It’s a good idea to clear the configuration cache and re-cache it to avoid issues:
```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

## 6. Install npm dependencies
Install the required JavaScript dependencies using npm:
```bash
npm install
```

## 7. Run database migrations
Run the migrations to set up the database schema:
```bash
php artisan migrate:fresh
php artisan db:seed
```

## 8. Run Vite and Laravel servers
To run the application, open two terminal windows:

- **Terminal 1**: Start the Vite development server
```bash
npm run dev
```

- **Terminal 2**: Start the Laravel development server
```bash
php artisan serve
```

Now, your application should be running locally! => http://localhost:8000/

---

## Troubleshooting
- **Missing `.env` file**: If you don’t have a `.env` file, create one by copying `.env.example` and updating it with the correct settings.
- **Database Connection Issues**: Ensure your database settings in `.env` are correct and that the database exists.
