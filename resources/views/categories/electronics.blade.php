@extends('layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('header')
<h1 class="text-xl font-bold">Electronics Category</h1> <!-- Menampilkan header kategori elektronik -->
@endsection

@section('content')
<!-- Menggunakan komponen untuk menampilkan kategori elektronik -->
<x-electronics-category :categoryData="$categoryData" />
@endsection