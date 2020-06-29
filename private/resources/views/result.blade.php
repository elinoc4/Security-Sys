@extends('layouts.dash')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
       <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="../assets/img/faces/marc.jpg" />
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category">{{$staff->type}}</h6>
              <h4 class="card-title">{{$staff->name}}</h4>
              <h4 class="card-title">{{$staff->idno}}</h4>
              <p class="card-description">
                {{$staff['dept']}}              </p>
              <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection






