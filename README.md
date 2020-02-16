<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Install Laravel

- composer require laravel/ui

- php artisan ui vue --auth

- npm install

- npm install tailwindcss

- npx tailwind init

- composer require laravel/telescope

- php artisan telescope:install

- composer require tcg/voyager

- php artisan voyager:install --with-dummy

- composer require pusher/pusher-php-server "~4.0"

- npm install --save laravel-echo pusher-js

- php artisan make:event MessageSent

- env변경, app.php에 App\Providers\BroadcastServiceProvider::class, 주석해제

- 채널받기
  created(){
          window.Echo.private('chats').listen('MessageSent', e=>{
            console.log(e);
            this.messages.push(e.message);
          });
        },

- channels.php에서 private채널 작성

- npm i vue-chat-scroll

## URL Laravel

- Voyager -> /admin

- Telescope -> /telescope             


