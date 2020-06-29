@extends('layouts.dash')
@section('content')
<div class="content">
    <div class="form-family">
        <form action="/save" method="POST" class="form-group" enctype="multipart/form-data">
            @csrf
            <input type="file" placeholder="upload an excel file" class="" name="upload">
            
            <input type="submit" class="form-button">
            @if(session()->has('message'))
                <h1>
                    {{session()->get('message')}}
                </h1>
            @endif
        </form>
    </div>
</div>
@endsection
