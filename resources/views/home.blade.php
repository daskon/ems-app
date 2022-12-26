@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Welcome Admin</h1>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                  <div class="card-content bg-success">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          <i class="icon-pencil primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right" style="cursor: pointer">
                          <h3>{{$count}}</h3>
                          <a href="{{ url('employees') }}" class="text-white" >
                          <span>Employees</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
