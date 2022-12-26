@extends('layouts.app')

@section('content')
    <div class="container- p-4">
        <div class="card" style="width: 70rem;">
            <div class="card-header">
              Company Information
            </div>
              @if(session()->has('message'))
              <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
              </div>
              @endif
            <div class="card-body">
                @if($isEmpty)
                  <button class="btn btn-warning btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" >
                    <span class="fa fa-keyboard"></span>
                      UPDATE
                  </button>
                @endif
                <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="name">Name</label>
                          <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="Company Name"
                            value="@if($name){{$name}} @endif" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                      <div class="form-group col-md-4">
                          <label for="email">Email</label>
                          <input type="email"
                              class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                              placeholder="Email"
                              value="@if($email){{$email}} @endif" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-group col-md-4">
                        <label for="website">Website</label>
                        <input type="url"
                                class="form-control @error('website') is-invalid @enderror" id="website" name="website"
                                placeholder="Web address"
                                value="@if($website){{$website}} @endif" />
                          @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputCity">Company Logo</label>
                        <input type="file"
                        class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                        @error('logo')
                              <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" {{ $isEmpty ? 'disabled': ''}}>SAVE</button>
                </form>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <form method="POST" action="{{route('update')}}" enctype="multipart/form-data">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                          <h4 class="modal-title custom_align" id="Heading">Edit Company</h4>
                      </div>
                      <div class="modal-body">
                          @csrf
                          <div class="form-group">
                              <input class="form-control " type="text" id="name" name="name"
                                value="{{$name}}" />
                          </div>
                          <div class="form-group">
                              <input class="form-control " type="email" id="email" name="email"
                               value="{{$email}}" />
                          </div>
                          <div class="form-group">
                            <input class="form-control " type="url" id="website" name="website"
                              value="{{$website}}" />
                          </div>
                          <input type="hidden" name="id" value="{{$id}}" />
                      </div>
                      <div class="modal-footer ">
                          <button type="submit" class="btn btn-warning btn-sm" style="width: 100%;">
                              Update
                          </button>
                      </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
    </div>
@endsection