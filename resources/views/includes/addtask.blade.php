

<!-- Add -->
<div class="modal fade  bd-example-modal-lg" id="addtask">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Add Task</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="{{ route('tasks.store')}}" enctype="multipart/form-data">
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
                      <input type="number" class="form-control" name="days">
                    </div>
                </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">Hours</label>

                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="hours">
                    </div>
                </div>
               
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Add task</label>
                     <div class="col-sm-8">
                      <textarea class="form-control" name="taskname" ></textarea>
                    </div>
                </div> 
               
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primar btn-flat"  style=" background: #006DF0; color: #fff;" ><i class="fa fa-save"></i> Save</button>
            </div>
              </form>
            </div>
        </div>
    </div>
  </div>
