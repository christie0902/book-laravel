@extends('layout.admin')

@section('content')
<h1>List of users</h1>
<div id="root"></div>
@viteReactRefresh
@vite('resources/js/users/main.jsx')
@endsection