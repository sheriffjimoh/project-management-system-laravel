 @extends('my_layout.appbar')
 
      @section('content')
     
     <br> <br>

        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/Dashboard</span>
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
       
  
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                      <h5>Companies</h5>
                                <h1>*<span class="counter  text-danger">{{$company}}</span> <span class="tuition-fees">companies</span></h1>

                              
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                 <h5> Projects</h5>
                                <h1><i class="fa fa-ruppees"></i><span class="counter  text-success">{{$project}}</span> <span class="tuition-fees">projects</span></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                       
                                <h5>Tasks</h5>
                                <h2>*<span class="counter  text-info">{{$task}}</span> <span class="tuition-fees">tasks</span></h2>
                         
                            </div>
                        </div>
                    </div>
                    
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                       
                                <h5>Roles</h5>
                                <h2>*<span class="counter  text-warning">{{$role}}</span> <span class="tuition-fees">roles</span></h2>
                         
                            </div>
                        </div>
                    </div>
                    
              
            </div>
        </div></div>
        <br><br> <br><br>
     
      @endsection
