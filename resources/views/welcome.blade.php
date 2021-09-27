<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MarsRover</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                padding-left: 20%;
                padding-right: 20%;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Welcome to mars rovers</div>
        </div>
        <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

<h1 id="about-mars-rover-case-study">About Mars Rover Case Study</h1>
<p>Mars Rover is a RESTful API. The project is purpose creating plateau and rover and discovery at mars scenario.  Developed with PHP &amp;&amp; Laravel.</p>
<h2 id="requirements">Requirements</h2>
<ul>
<li><strong><a href="https://www.php.net/downloads.php">PHP &gt; 7.x.x</a></strong></li>
<li><strong><a href="https://getcomposer.org/download/">Composer</a></strong></li>
<li><strong><code>extension=shmop</code> must open from php.ini file</strong></li>
</ul>
<h2 id="installation-test">Installation &amp;&amp; Test</h2>
<ul>
<li>Download Source Code <a href="https://github.com/ffrhtt/mars-rover"><b> GITHUB repository --> https://github.com/ffrhtt/mars-rover</b></a></li>
<li>Open the Terminal/Command Prompt in source code folder.</li>
<li>Run <code>composer install</code>.</li>
<li>Run <code>php artisan serve</code> then you will see application url like  <a href="http://127.0.0.1:8001">http://127.0.0.1:8001</a>.</li>
<li>After that the service will start.</li>
<li>Open the new Terminal in this folder and run <code>php artisan test</code><h2 id="working-logic"></h2>
</li>
</ul>
<h2 id="versioning">Working Logic</h2>
<h5 id="versioning">Versioning</h5>
<p>New versioning can defined with url by routes in <code>App\Providers\RouteServiceProvider</code> in function <code>mapApiRoutes()</code>. And <code>.\config\app.php</code> in api_latest indicates to latest version. In addition this already using  <code>.\routes\api_v1.php</code>,<code>.\routes\api_v2.php</code>  folder.</p>
<h5 id="mars-rover-library">Mars Rover Library</h5>
<p>There are all models in <code>.\app\MarsRovers</code> folder. <code>Plateu</code>,<code>Position</code>,<code>Rover</code>,<code>Size</code>,<code>CommandsAdapter\CommandsNasa</code></code>,<code>Data\Recorder</code></p>
<ul>
<li><code>CommandsAdapter\CommandsNasa</code> decoder the commands using the Adapter pattern with <code>CommandsAdapter\Commands</code></li>
<li><code>Data\Recorder</code> uses for memory storage with <code>Data\SHMAP</code></li>
</ul>
<h5 id="mars-rover-http-controllers">Mars Rover Http controllers</h5>
<p>There are all models in <code>.\app\Http\Controllers\V1</code> and <code>.\app\Http\Controllers\V2</code></p>
<h2 id="api-endpoints-tree">API Endpoints tree</h2>
<ul>
<li>/api/v1 <strong>(active)</strong><ul>
<li>/plateua<ul>
<li>/create</li>
<li>/get</li>
</ul>
</li>
<li>/rover<ul>
<li>/create</li>
<li>/sent/command</li>
<li>/get</li>
<li>/get/state</li>
</ul>
</li>
</ul>
</li>
<li>/api/v2 <strong>(for future)</strong></li>
</ul>
<p>For more detail check to the <code>.\docs</code> folder.</p>

    </body>
</html>
