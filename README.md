<picture>
    <source srcset="public/img/sobongo movies.png"  
            media="(prefers-color-scheme: dark)">
    <img src="public/img/sobongo movies.png" alt="App Logo">
</picture>

> **Important Note:** This Project is ready for Production. But use code from main branch only. If you find any bug or have any suggestion please create an Issue.

# Local Installation

- run `` git clone git@gitlab.com:makobongo/udeseamovies.git ``
- run ``composer install `` 
- run `` npm install ``
- run ``npm run dev``
- copy .env.example to .env
- run `` php artisan key:generate ``
- set up your MVZ_TOKEN=(token) in the .env for more information visit https://www.themoviedb.org/settings/api
- run `` php artisan serve ``
- then visit `` http://localhost:8000 or http://127.0.0.1:8000 ``.

## Demo
**Live Demo:** https://movies.sobongo.dev

## m Vies Features

- **Renders Trending & Upcoming movies**

# License
**[Creative Commons Attribution 4.0	cc-by-4.0](https://creativecommons.org/licenses/by/4.0/)**