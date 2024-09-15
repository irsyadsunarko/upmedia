<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upmedia</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('/image/favicon.svg') }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="https://kit.fontawesome.com/1a746e98b1.js" crossorigin="anonymous"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gray1: '#F5F3F0',
          }
        }
      }
    }
  </script> --}}
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
    *{
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>
<body>