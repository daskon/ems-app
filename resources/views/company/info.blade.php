@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card text-center">
            @foreach ($company as $item)
            <div class="card-header">
                <h3>COMPANY INFORMATION</h3>
                <div class="card-header-title">
                  <img src={{asset('img'). '/' . $item->logo}} />
                </div>
              </div>
              <div class="card-body">
                Name : <strong>{{$item->name}}</strong>
                <br/>
                Email : <strong>{{$item->email}}</strong>
                <br/>
                Website : <strong>{{$item->website}}</strong>
              </div>
            @endforeach
        </div>
    </div>
@endsection