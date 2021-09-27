<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

# About Mars Rover Case Study

Mars Rover is a RESTful API. The project is purpose creating plateau and rover and discovery at mars scenario.  Developed with PHP && Laravel.

## Requirements

- **[PHP > 7.x.x](https://www.php.net/downloads.php)**
- **[Composer](https://getcomposer.org/download/)**
- **<code>extension=shmop</code> must open from php.ini file**


## Installation && Test

- Download Source Code
- Open the Terminal/Command Prompt in source code folder.
- Run <code>composer install</code>.
- Run <code>php artisan serve</code> then you will see application url like  http://127.0.0.1:8001.
- After that the service will start.
- Open the new Terminal in this folder and run <code>php artisan test</code>
## Working Logic

##### Versioning
New versioning can defined with url by routes in <code>App\Providers\RouteServiceProvider</code> in function <code>mapApiRoutes()</code>. And <code>.\config\app.php</code> in api_latest indicates to latest version. In addition this already using  <code>.\routes\api_v1.php</code>,<code>.\routes\api_v2.php</code>  folder.

##### Mars Rover Library 
There are all models in <code>.\app\MarsRovers</code> folder. <code>Plateu</code>,<code>Position</code>,<code>Rover</code>,<code>Size</code>,<code>CommandsAdapter\CommandsNasa</code></code>,<code>Data\Recorder</code>
- <code>CommandsAdapter\CommandsNasa</code> decoder the commands using the Adapter pattern with <code>CommandsAdapter\Commands</code>
- <code>Data\Recorder</code> uses for memory storage with <code>Data\SHMAP</code>

##### Mars Rover Http controllers
There are all models in <code>.\app\Http\Controllers\V1</code> and <code>.\app\Http\Controllers\V2</code>

## API Endpoints tree
- /api/v1 **(active)**
    - /plateua
        - /create
        - /get
    - /rover
        - /create
        - /sent/command
        - /get
        - /get/state
- /api/v2 **(for future)**


For more detail check to the <code>.\docs</code> folder.

