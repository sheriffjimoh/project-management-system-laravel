@extends('my_layout.appbar')



 
      @section('content')
       @include('includes.addroles')
       <br><br>

        <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                         
                                          <a href="#addrole" data-toggle="modal"  class="btn btn-flat " id="btn-primar" style=" background:black; color: #fff;"><i class="fa fa-plus"></i>&nbsp;Create Roles</a>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="/home">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Roles</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
        </div>
        @endif

         @if (session('status'))
             <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
                  {{ session('status') }}
              </div>
          @endif

        <main role="main" class="container">
        
                <?php if (isset($roles)) : ?> 
  
                <div class="d-flex bg-blue align-items-center p-3 my-3 text-white-50 rounded box-shadow">
                    <img class="mr-3" src="{{ asset('app-assets/img/logo/Companies.jpg')}}" alt="" width="48" height="48">
                    <div class="lh-100">
                      <h6 class="mb-0 text-white lh-100">Roles List</h6>
                      <small>Since 2011</small> 
                    </div> 
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                  <h6 class="border-bottom border-gray pb-2 mb-0">sorted by date</h6>
                     @foreach ($roles as $role)
                                  
                  <div class="media text-muted pt-3">
                
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                      <strong class="d-block text-gray-dark"><a href="/roles/{{$role->id}}"> {{$role->name}}</a></strong>
                  
                    </p>
                    <br><br>  
                     <a href="/roles/{{$role->id}}/edit" class="btn btn-primary">Update</a> 
                     {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',$role->id ],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}

                        <a href="#" class="btn btn-danger" onclick="$(this).closest('form').submit();">Delete</a>

                    {!! Form::close() !!}
                  </div>
                  @endforeach
                  <small class="d-block text-right mt-3">
                    <a href="#">View All</a>
                  </small>
                </div>
                <?php endif; ?>

                  @if(isset($edit_role))
              <div class="d-flex bg-blue align-items-center p-3 my-3 text-white-50 rounded box-shadow">
              <img class="mr-3" src="{{ url('storage/images/'.$edit_role->photos)}}" alt="" width="48" height="48">
              <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Edit {{$edit_role->name}}</h6>
                <small>{{$edit_role->created_at}}</small> 
              </div> 
            </div>
                   <div class="my-3 p-3 bg-white rounded box-shadow ">
                    <a href="/companies/"><i class="fa fa-arrow-left"></i>  Cancel</a>
                    <form class="form-horizontal" method="POST" action="{{ route('roles.update', [$edit_role->id])}}" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="_method" value="put">
                   <!--  <input type="hidden" class="form-control" name="id" value="{{$edit_role->id}}">
                       -->
                      <div class="form-group">
                        <label  class="col-sm-4 control-label">Role Name</label>

                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="name" value="{{$edit_role->name}}">
                        </div>
                    </div>
                    
                    
                    </div>
                <div class="form-group col-sm-12 text-center ">
                  <button type="submit" class="btn btn-primar btn-flat   text-center"  style=" background: #006DF0; color: #fff;" ><i class="fa fa-save"></i> Save</button>
                </div>
                  </form>
                   </div>
                  @endif
        
          </main>


        



      @endsection