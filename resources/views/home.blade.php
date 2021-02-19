@extends('layouts.app')

@section('content')
<style>
    th, td{
        text-align: center;
    }
    input{
        margin: 2px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-weight: bold">Restraunts</div>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center">{{ $error }}</div>
                @endforeach
                @if(session('message'))
                <div class="alert alert-success text-center">{{ session()->get('message') }}</div>
                @endif
            <!-- Button trigger modal -->
            <div class="col-md-4 mt-2 ml-2">

                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                    Add New Restraunt
                </button>
            </div>
  
  <!-- Modal -->
  <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Your New Restaurant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<form method="POST" action="{{ route('store.restaurant') }}" enctype="multipart/form-data">
    @csrf
        <div class="modal-body" style="">
            <div class="form-group">
                <label for="exampleFormControlFile1">Choose Image <p style="color: red;display:inline">*</p></label>
                <input type="file" required name="image" class="form-control-file" id="exampleFormControlFile1">
              </div>
              <div class="row">

                  <div class="col-6">
                      <label for="">Restaurant Name <p style="color: red;display:inline">*</p></label>
                      <input type="text" name="restaurant_name" required class="form-control" placeholder="Restaurant name">
                    </div>
                    <div class="col-6">
                        <label for="">Owner Name</label>
                        <input type="text" name="owner_name" class="form-control" placeholder="Owner name">
                    </div>
                </div>
              <div class="row">
                <div class="col-12 mg-0" style="">
                  <label for="">Restaurant Type/Cuisines <p style="color: red;display:inline">*</p></label>
                    <select style="" name="type" onfocus='this.size=5;' required onblur="this.size=1" onchange='this.size=1; this.blur();' class="custom-select custom-select mb-3">
                        <option selected value="{{ null }}" disabled>Select Type/Cuisines</option>
                        <option value="American">American</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Bahrini">Bahrini</option>
                        <option value="Breakfast">Breakfast</option>
                       
                      </select>
                  </div>
                  <div class="col-12">

                      <p style="display: inline">Open 24 Hours:</p>
                      <div class="custom-control custom-radio" style="display: inline">
                          <input type="radio" id="customRadio1" name="open" value="{{ true }}" class="custom-control-input">
                          <label class="custom-control-label" for="customRadio1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio" style="display: inline">
                            <input type="radio" id="customRadio2" name="open" value="{{ false }}" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">No</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Phone Number </label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="col-6">
                        <label for="">Whatsapp Number</label>
                      <input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp Number">
                    </div>
                    <div class="col-6">
                        <label for="">Instgram Link</label>
                    <input type="text" name="instagram" class="form-control" placeholder="Instgram Link">
                </div>
                <div class="col-6">
                    <label for="">Website Link <p style="color: red;display:inline">*</p></label>
                    <input type="text" name="website" required class="form-control" placeholder="Website Link">
                </div>
                <div class="form-group col-12">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>
                                    Image
                                </th>
                                <th>
                                   Restaurant Name
                                </th>
                                <th>
                                    Owner Name
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Open
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Whatsapp
                                </th>
                                <th>
                                    Instagram
                                </th>
                                <th>
                                    WebSite
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $item)
                                
                            <tr>
                                <td> <img width="50px" height="50px" src="{{ asset($item->image) }}"> </td>
                                <td>{{ $item->restaurant_name }}</td>
                                <td>{{ $item->owner_name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->all_day ? 'yes' : 'no' }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->whatsapp }}</td>
                                <td>{{ $item->instagram }}</td>
                                <td>{{ $item->website }}</td>
                                <td>{{ $item->description }}</td>
                                <td><div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" data-toggle="modal" data-target="#edit{{ $item->id }}">Edit</a>
                                      <a class="dropdown-item text-danger" href="#"  onclick='document.getElementById("delete{{ $item->id }}").submit();'>Delete</a>
                                      <form action="{{ route('destroy.restaurant',$item) }}" id="delete{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <div class="modal fade"  id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
                                <div class="modal-content" >
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Edit Your New Restaurant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                          <form method="POST" action="{{ route('update.restaurant',$item) }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                                  <div class="modal-body" style="">
                                      <div class="form-group">
                                          <label for="exampleFormControlFile1">Choose Image <p style="color: red;display:inline">*</p></label>
                                          <input type="file"  name="image" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                        <div class="row">
                          
                                            <div class="col-6">
                                                <label for="">Restaurant Name <p style="color: red;display:inline">*</p></label>
                                                <input type="text" value="{{ $item->restaurant_name }}" name="restaurant_name" required class="form-control" placeholder="Restaurant name">
                                              </div>
                                              <div class="col-6">
                                                  <label for="">Owner Name</label>
                                                  <input type="text" name="owner_name" value="{{ $item->owner_name }}" class="form-control" placeholder="Owner name">
                                              </div>
                                          </div>
                                        <div class="row">
                                          <div class="col-12 mg-0" style="">
                                            <label for="">Restaurant Type/Cuisines <p style="color: red;display:inline">*</p></label>
                                              <select style="" name="type" onfocus='this.size=5;' required onblur="this.size=1" onchange='this.size=1; this.blur();' class="custom-select custom-select mb-3">
                                                  <option selected value="{{ null }}" disabled>Select Type/Cuisines</option>
                                                  <option value="American" @if($item->type == 'American') selected @endif>American</option>
                                                  <option value="Arabic" @if($item->type == 'Arabic') selected @endif>Arabic</option>
                                                  <option value="Bahrini" @if($item->type == 'Bahrini') selected @endif>Bahrini</option>
                                                  <option value="Breakfast" @if($item->type == 'Breakfast') selected @endif>Breakfast</option>
                                                 
                                                </select>
                                            </div>
                                            <div class="col-12">
                          
                                                <p style="display: inline">Open 24 Hours: </p>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" id="customRadioInline1{{ $item->id }}" name="open" value="{{ true }}"  @if($item->all_day == true) checked  @endif class="custom-control-input">
                                                  <label class="custom-control-label" for="customRadioInline1{{ $item->id }}" for="customRadioInline1">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" id="customRadioInline2{{ $item->id }}" name="open" value="{{ false }}" @if($item->all_day == false) checked  @endif class="custom-control-input">
                                                  <label class="custom-control-label" for="customRadioInline2{{ $item->id }}">no</label>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                  <label for="">Phone Number </label>
                                                  <input type="text" value="{{ $item->phone_number }}" name="phone" class="form-control" placeholder="Phone Number">
                                              </div>
                                              <div class="col-6">
                                                  <label for="">Whatsapp Number</label>
                                                <input type="text" name="whatsapp" value="{{ $item->whatsapp }}" class="form-control" placeholder="Whatsapp Number">
                                              </div>
                                              <div class="col-6">
                                                  <label for="">Instgram Link</label>
                                              <input type="text" name="instagram" value="{{ $item->instagram }}" class="form-control" placeholder="Instgram Link">
                                          </div>
                                          <div class="col-6">
                                              <label for="">Website Link <p style="color: red;display:inline">*</p></label>
                                              <input type="text" name="website" value="{{ $item->website }}" required class="form-control" placeholder="Website Link">
                                          </div>
                                          <div class="form-group col-12">
                                              <label for="exampleFormControlTextarea1">Description</label>
                                              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $item->description }}</textarea>
                                            </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                              </form>
                                </div>
                              </div>
                            </div>
                            @endforeach
                            
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
