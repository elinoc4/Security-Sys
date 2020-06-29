@extends('layouts.dash')
@section('content')
<div class="content">
    <form action="/carsearch" method="POST">
        @csrf
        <input type="text" name="search" placeholder="Search Staff"/>
        <input type="submit" name="submit" placeholder="Search"/>
    </form>
</div>
@endsection


