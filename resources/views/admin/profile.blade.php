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
                                         {{ Auth::user()->firstname.' '.Auth::user()->lastname }}
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="/home">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">myprofile</span>
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
	      
              <?php if (Auth::user()) : ?> 
               
            <div class="my-3 p-3 bg-white rounded box-shadow col-sm-6 offset-sm-2">
            <div class="card">
                      <div class="card-header">
                        <h3>User Data</h3>
                      </div>
                        <ul class="list-group text-center">
                           <li class="list-group-item">Firstname: &nbsp;{{Auth::user()->firstname}}</li>
                            <li class="list-group-item">lastname:  &nbsp;{{Auth::user()->lastname}}</li>
                             <li class="list-group-item">Email:  &nbsp;{{Auth::user()->email}}</li>
                              <li class="list-group-item">city:  &nbsp;{{Auth::user()->city}}</li>
                        </ul>
                     </div>
            </div>
            <?php endif; ?>

        
    </main>


      @endsection