@extends('layouts.master')

@section('title', 'About Scoreboard')

@section('content')
<div class="row">
    <div class="small-12 small-centered medium-9 medium-centered large-6 large-centered columns panel">
        <h1>Laravel 4 :: Scoreboard!</h1>
        <ul class="no-bullet">
            <li>Ruby-Sass stylesheet compilation (.scss)</li>
            <li>Server with LiveReload</li>
            <li>Publishing to public directory</li>
            <li>JSHint</li>
            <li>Grunt Bower install</li>
            <li>Imagemin</li>
        </ul>
        <h3>Grunt tasks:</h3>
        <ul class="no-bullet">
            <li>'grunt' - watching (Sass, Server on 127.0.0.1:9000 with LiveReload)</li>
            <li>'grunt compile-sass' - Sass</li>
            <li>'grunt validate-js' - JSHint</li>
            <li>'grunt bower-install' - injecting bower libraries</li>
            <li>'grunt publish' - public directory</li>
            <li>'grunt server-public' - server on 127.0.0.1:9001 - public directory (preview only)</li>
        </ul>
    </div>
</div>
@overwrite


