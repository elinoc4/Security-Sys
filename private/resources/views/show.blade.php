@extends('layouts.dash')
@section('content')
<div class="content">
    <form class="md-form" action="/save" enctype="multipart/form-data" method="post">
        @csrf
  <div class="file-field">
    <div class="btn btn-secondary btn-sm float-left">
      <span>Choose file</span>
      <input type="file" name="upload">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate btn btn-secondary" type="" placeholder="Upload your file">
    </div>
  </div>

</form>
   
    <div class="card-body">
        <div class="table-responsive">
             <table class="table">
                <thead class=" text-primary">
                    <th>Name</th>
                    <th>Type</th>
                    <th>Idno</th>
        
                </thead>
                <tbody>
                    @foreach ($Staff as $staff)
                    
                    <tr>
                        
                       <td><a href="/result/{{$staff->id}}" class=""> {{$staff->name}}</a></td>
                       <td> {{$staff->type}}</td>
                       <td> {{$staff->idno}}</td>
                       {{-- <td> {{$status}}</td> --}}
                       
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$Staff->links()}}
    </div>
</div>
@endsection
