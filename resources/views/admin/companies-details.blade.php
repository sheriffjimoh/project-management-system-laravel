@extends('my_layout.appbar')
 
      @section('content')
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
                                         <h3>{{$company->name}} Details</h3>
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





        <main role="main" class="container bg-white">
      <a href="/companies/"><i class="fa fa-arrow-left"></i> Back</a>

      <div class="my-3 p-3  rounded box-shadow">
        <!-- <h6 class="border-bottom border-gray pb-2 mb-0">sorted by date</h6> -->
        <div class="media text-muted pt-3">
         <img src="{{ url('storage/images/'.$company->photos)}}" alt="" class=""  width="120" style="margin-bottom: 30px; height: 80px; margin-right: 20px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="/companies-details"> {{$company->name}}</a></strong>
            {{$company->description}}
            <br>
            <strong class="d-block text-gray-dark"><a href=""> {{$company->created_at}}</a></strong>
          </p>
          </div>
           
       

         <!-- List group -->
            <div class="offset-lg-1" id="myList">
            <div  class="btn-group" id="mytabList" role="tablist">
              <a class="btn btn-primary active" data-toggle="list" href="#project" id="project-tab" role="tab">Project</a>
              <a class="btn btn-primary" data-toggle="list" href="#task" id="task-tab" role="tab">Task</a>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="project" role="tabpanel"> 
               
                <ul class="list-group">
                  <?php if (!empty($company->projects)) :?>
                  @foreach($company->projects as $cproject)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                   <div>  
                    <a href="" ><span class="lead"> {{$cproject->name}}</span> </a>
                      <br>
                     <p>{{$cproject->description}}</p>
                   </div> 
                  </li>
                  <br>
                  @endforeach

                  <?php else: ?>
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                   No project assigned
                  </li>
                  <?php endif; ?>
                </ul>            

              </div>
              <div class="tab-pane" id="task" role="tabpanel">
                <?php if (!empty($company->task)) :
                        $task = $company->task;
                          
                  ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                   <div>  
                    <a href="" ><span class="lead"> {{$task->name}}</span> </a>
                      <br>
                     <p>{{$task->description}}</p>
                   </div> 

                    
               <!--      <span class="badge badge-success badge-pill">current</span> -->
                  </li>

                  <?php else: ?>
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                   No Task assigned
                  </li>
                  <?php endif; ?>
                </div>
            </div>
            </div>
           <!--  <small class="d-block text-right mt-3">
          <a href="#">View All</a>
        </small> -->
      
         </div>
    </main>
     @endsection