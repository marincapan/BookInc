# BookInc
A simple Laravel app for book reservations.
## Local setup
Here is a short tutorial how to seup this project locally. It is expected you have SSH acces, installed Composer, Git and PHP7, and a web server like Apache or Nginx.

### Git
First you have to clone the repository with:
```
git clone https://github.com/marincapan/BookInc.git
```

### Composer
Second, you have to run:
```
composer install
```

### Node
Since this project has a few Vue.js components for the UI, you also have to run:
```
npm isntall
```

### Database
Please open a new MySQL database because you will need it. Also, make a new .env file with:
```
cp .env.example .env
```
and don't forget to fill it with information for your database connection.

### Artisan
Now you can generate a new key for you application:
```
php artisan key:generate
```
and migrate the schemas to your database with:
```
php artisan migrate
```
and in the end when you setup your Apache/Nginx web server you can run it with:
```
php artisan serve
```
The application will probably be available at [localhost:8000](http://127.0.0.1:8000)

## License
[MIT](https://choosealicense.com/licenses/mit/)
