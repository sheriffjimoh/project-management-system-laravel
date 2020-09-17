@extends('my_layout.appbar')



 
      @section('content')
       @include('includes.addtask')
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
                                         
                                          <a href="#addtask" data-toggle="modal"  class="btn btn-flat " id="btn-primar" style=" background:black; color: #fff;"><i class="fa fa-plus"></i>&nbsp;Create Task</a>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="/home">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Tasks</span>
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
        
                <?php if (isset($tasks)) : ?> 
  
                <div class="d-flex bg-blue align-items-center p-3 my-3 text-white-50 rounded box-shadow">
                    <img class="mr-3" src="{{ asset('app-assets/img/logo/Companies.jpg')}}" alt="" width="48" height="48">
                    <div class="lh-100">
                      <h6 class="mb-0 text-white lh-100">tasks List</h6>
                      <small>Since 2011</small> 
                    </div> 
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                  <h6 class="border-bottom border-gray pb-2 mb-0">sorted by date</h6>
                     @foreach ($tasks as $task)
                                  
                  <div class="media text-muted pt-3">
                
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                      <strong class="d-block text-gray-dark"><a href="/tasks/{{$task->id}}"> {{$task->name}}</a></strong>
                  
                    </p>
                    <br><br>  
                     <a href="/tasks/{{$task->id}}/edit" class="btn btn-primary">Update</a> 
                     {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy',$task->id ],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}

                        <a href="#" class="btn btn-danger" onclick="$(this).closest('form').submit();">Delete</a>

                    {!! Form::close() !!}
                  </div>
                  @endforeach
                  <small class="d-block text-right mt-3">
                    <a href="#">View All</a>
                  </small>
                </div>
                <?php endif; ?>

                  @if(isset($edit_task))
              <div class="d-flex bg-blue align-items-center p-3 my-3 text-white-50 rounded box-shadow">
              <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Edit {{$edit_task->name}}</h6>
                <small>{{$edit_task->created_at}}</small> 
              </div> 
            </div>
                   <div class="my-3 p-3 bg-white rounded box-shadow ">
                    <a href="/companies/"><i class="fa fa-arrow-left"></i>  Cancel</a>
                    <form class="form-horizontal" method="POST" action="{{ route('tasks.update', [$edit_task->id])}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="put">
                     @csrf
                     <div class="form-group">
                    <label  class="col-sm-4 control-label">Company name</label>

                    <div class="col-sm-8">
                     <select class="form-control" name="company">
                        <option selected disabled>select company----</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                     </select>
                   </div>
                </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">Project name</label>

                    <div class="col-sm-8">
                     <select class="form-control" name="project">
                        <option selected disabled>select project----</option>
                        @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
                     </select>
                   </div>
                </div>
                    <div class="form-group">
                    <label  class="col-sm-4 control-label">Asign user</label>

                    <div class="col-sm-8">
                     <select class="form-control" name="user">
                        <option selected disabled>select user----</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->firstname.' '.$user->lastname}}</option>
                        @endforeach
                     </select>
                   </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-4 control-label">Days</label>

                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="days" value="{{$edit_task->days}}">
                    </div>
                </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">Hours</label>

                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="hours"  value="{{$edit_task->hours}}">
                    </div>
                </div>
               
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Add task</label>
                     <div class="col-sm-8">
                      <textarea class="form-control" name="taskname" >{{$edit_task->name}}</textarea>
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