@extends('my_layout.appbar')



 
      @section('content')
       @include('includes.addcompany')
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
                                         
                                          <a href="#addcompany" data-toggle="modal"  class="btn btn-flat " id="btn-primar" style=" background:black; color: #fff;"><i class="fa fa-plus"></i>&nbsp;Create Company</a>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="/home">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Companies</span>
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
	      
              <?php if (isset($companies)) : ?> 
                <div class="d-flex bg-blue align-items-center p-3 my-3 text-white-50 rounded box-shadow">
          <img class="mr-3" src="{{ asset('app-assets/img/logo/Companies.jpg')}}" alt="" width="48" height="48">
          <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Companies Listinings</h6>
            <small>Since 2011</small> 
          </div> 
        </div>

            <div class="my-3 p-3 bg-white rounded box-shadow">
              <h6 class="border-bottom border-gray pb-2 mb-0">sorted by date</h6>
                 @foreach ($companies as $company)
                              
              <div class="media text-muted pt-3">
              	<a href="/companies/{{$company->id}}">
          
              <img src="{{ url('storage/images/'.$company->photos)}}" alt="" class=""  width="120" style="margin-bottom: 30px; height: 80px; margin-right: 20px;"></a>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark"><a href="/companies/{{$company->id}}"> {{$company->name}}</a></strong>
                <?php  
                     if (strlen($company->description) > 120) {
                        $substr= substr( $company->description, 0 , 120).'...';
                      } else{
                         $substr= $company->description;
                      }?>

                      {{  $substr }}
                </p>
                <br><br>  
                 <a href="/companies/{{$company->id}}/edit" class="btn btn-primary">Update</a> 
                 {!! Form::open(['method' => 'DELETE', 'route' => ['companies.destroy',$company->id ],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}

                    <a href="#" class="btn btn-danger" onclick="$(this).closest('form').submit();">Delete</a>

                {!! Form::close() !!}
              </div>
              @endforeach
              <small class="d-block text-right mt-3">
                <a href="#">View All</a>
              </small>
            </div>
            <?php endif; ?>

              @if(isset($edit_company))
          <div class="d-flex bg-blue align-items-center p-3 my-3 text-white-50 rounded box-shadow">
          <img class="mr-3" src="{{ url('storage/images/'.$edit_company->photos)}}" alt="" width="48" height="48">
          <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Edit {{$edit_company->name}}</h6>
            <small>{{$edit_company->created_at}}</small> 
          </div> 
        </div>
               <div class="my-3 p-3 bg-white rounded box-shadow ">
                <a href="/companies/"><i class="fa fa-arrow-left"></i>  Cancel</a>
                <form class="form-horizontal" method="POST" action="{{ route('companies.update', [$edit_company->id])}}" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="_method" value="put">
                <input type="hidden" class="form-control" name="id" value="{{$edit_company->id}}">
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">Company name</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="name" value="{{$edit_company->name}}">
                    </div>
                </div>
               
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Description</label>
                     <div class="col-sm-6">
                      <textarea class="form-control" name="description" value="{{$edit_company->description}}" >{{$edit_company->description}}</textarea>
                    </div>
                </div> 
                <div class="form-group">
                 
                    <label class="col-sm-4 control-label">Change Image</label>

                    <div class="col-sm-6">
                      <input type="file" class="form-control"  name="photo">
                    </div>
               <!--  </div>
            <div class="form-group col-sm-6 offset-lg-2"> -->
              <button type="submit" class="btn btn-primar btn-flat "  style=" background: #006DF0; color: #fff;" ><i class="fa fa-save"></i> Save</button>
            </div>
              </form>
               </div>
              @endif
        
    </main>


      @endsection