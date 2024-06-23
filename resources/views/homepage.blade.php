<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Encoraja</title>
        <link rel="icon" href="/img/encoraja.jpg" type="image/jpg">
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body class="">
        <header>
            <x-navbar/>
        </header>
        <article>
            <section>
                <x-content/>
            </section>
            <section class="about-us">
                <x-about-us-item/>
            </section>
            <section class="about-admin">
                <x-about-admin-item/>
            </section>
            <section>
                <x-events/>
            </section> 
            <section>
                <x-partners/>
            </section>   
            <section>
                <x-contact/>
            </section> 
            <footer>
                <x-infos/>
            </footer>  
        </article>

          

    </body>
