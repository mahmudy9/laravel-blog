<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyBlog') }}</title>

    <!-- Styles -->
    <!--link href="{{!! asset('css/app.css') !!}}" rel="stylesheet"-->
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector : "#mytext",
            height   : 400,
            width    : 700,
            //toolbar: 'undo redo | styleselect | bold italic | link image',
            plugins : 'codesample link image hr table textcolor contextmenu lists charmap preview anchor spellchecker searchreplace code textcolor',
            toolbar1  : 'undo redo styleselect bold italic forecolor backcolor alignleft aligncenter alignright charmap preview anchor spellchecker searchreplace ',
             toolbar2 :'bullist numlist outdent indent hr blockquote table tabledelete textcolor codesample code link unlink image source',
        });
    </script>
    <style>
            html {
        position: relative;
        min-height: 100%;
      }
      body {
        /* Margin bottom by footer height */
        margin-bottom: 60px;
      }
      .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
      }


      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      body > .container {
        padding: 60px 15px 0;
      }

      .footer > .container {
        padding-right: 15px;
        padding-left: 15px;
      }

      code {
        font-size: 80%;
      }
    </style>
</head>
<body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{ url('/') }}">Blogger</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('categories') }}">Categories</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ url('post/create') }}">Create Post</a>
          </li>
          <?php
           $user = Auth::user();
           ?>
           @if($user->level != '0')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
          </li>
          @endif
          @endauth


          <li class="nav-item">
            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('about') }}" >About</a>
          </li>
        </ul>
                            <!-- Right Side Of Navbar -->
                    <ul class="navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item btn btn-secondary"><a style="color:white" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item btn btn-primary"><a style="color:white" href="{{ route('register') }}">Register</a></li>
                        @else
                        
                        
                        <div class="dropdown show">
                                <a href="#" style="color:white" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    
                                        <a class="dropdown-item" href="{{ url('myposts') }}">My Posts</a>

                                        <a class="dropdown-item" href="{{ url('showprofile') }}">My Profile</a>
                                        <a class="dropdown-item" href="{{ url('editprofile') }}">Settings</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </div>
                        </div>
                        @endguest
                    </ul>

      </div>
    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>