@extends('layouts.dash')

@section('content')
<div class="content">
    <!--Message from search-->
   
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-car"></i>
                  </div>
                  <p class="card-category">Checkedin Cars</p>
                  <h3 class="card-title">{{$count}}
                    <small>Cars</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <i class="material-icons">date_range</i> {{now()->format('d')}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Staffs</p>
                  <h3 class="card-title">{{$Gs}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>Permanent Staffs
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-secondary card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-group"></i>
                  </div>
                  <p class="card-category">Contract Staffs</p>
                  <h3 class="card-title">{{$Cs}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> {{now()->format('Y')}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <p class="card-category">Interns</p>
                  <h3 class="card-title">{{$It}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>  {{now()->format('Y')}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Checkedin Cars</h4>
                  <p class="card-category">for {{now()->format('Y-m-d')}}</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Plate Number</th>
                      <th>Tally Number</th>
                      <th>Date</th>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td>{{$car->id}}</td>
                            <td>{{$car->plate_no}}</td>
                            <td>{{$car->tally_no}}</td>
                            <td>{{$car->date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Staffs</h4>
                  <p class="card-category">for {{now('Y')}}</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Department</th>
                    </thead>
                    <tbody>
                        @foreach($staff as $staffs)
                        <tr>
                            <td>{{ucwords($staffs->idno)}}</td>
                            <td>{{ucwords($staffs->name)}}</td>
                            <td>{{ucwords($staffs->type)}}</td>
                            <td>{{strtoupper($staffs->dept)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
