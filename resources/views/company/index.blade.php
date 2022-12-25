@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              Company Information
            </div>
            <div class="alert alert-success" role="alert">
                This is a success alert—check it out!
              </div>
              <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
              </div>
            <div class="card-body">
                <form>
                    @csrf
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="website">Website</label>
                      <input type="url" class="form-control" id="website" name="website" placeholder="Web address">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Company Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </form>
            </div>
        </div>
    </div>
@endsection