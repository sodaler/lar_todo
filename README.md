# Laravel Todo

### Installation

Setting up your development environment on your local machine :


- git clone https://github.com/sodaler/lar_todo.git
- cd lar_todo
- cp .env.example .env
- composer install
- npm install
- docker-compose up -d

---

### Before starting
You need to: <br>

Enter the app container:

- docker exec -it lar_todo_app bash

Run the migrations with queue listen:

- php artisan todo:install

Refresh database with seeds:

- php artisan todo:refresh

Configure env:

- Set smtp server settings
- Set telegram chat_id, token

Configure tests db:

- docker exec -it lar_todo_app bash
- php artisan make:migration --env testing
- php artisan test

### Tests user information after seeds

- email: test@example.com
- password: example123

---

### Some Screenshots

### Todo

![Screenshot](storage/git_images/screenshots/img.png)
![Screenshot](storage/git_images/screenshots/img_1.png)
![Screenshot](storage/git_images/screenshots/img_2.png)
![Screenshot](storage/git_images/screenshots/img_6.png)
![Screenshot](storage/git_images/screenshots/img_3.png)


### Email verification

![Screenshot](storage/git_images/screenshots/img_4.png)
![Screenshot](storage/git_images/screenshots/img_5.png)

### Telegram notifications

![Screenshot](storage/git_images/screenshots/img_7.png)



