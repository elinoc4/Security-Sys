@extends('layouts.dash')

@section('content')

<div class="content">
    <div form-family>
        <form action="/cars" method="POST" class="form-group">
            @csrf
            <input type="text" name="plate_no" placeholder="Plate Number" class="form-control" />
            <input type="text" name="tally_no" placeholder="Tally Number" class="form-control"/>
            <select name="status" class="form-control">
                <option value="1">Check In</option>
                <option value="0">Check Out</option>
            </select>
            <input value="{{now()}}" name="date" type="hidden"/>
            <input type="submit" name="CheckIn"/>
        </form>
        
    
    </div>
     <div class="col-lg-12 col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Cars</h4>
                  <p class="card-category">for {{now('Y')}}</p>
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
                       @foreach($carst as $cars)
                        <tr>
                            <td>{{$cars->id}}</td>
                            <td>{{$cars->plate_no}}</td>
                            <td>{{$cars->tally_no}}</td>
                            <td>{{$cars->date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $carst->links()}}
              </div>
            </div>
</div>

@endsection
