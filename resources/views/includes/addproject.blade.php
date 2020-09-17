

<!-- Add -->
<div class="modal fade  bd-example-modal-lg" id="addproject">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
              <h4 class="modal-title"><b>Add Project</b></h4>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="{{ route('projects.store')}}" enctype="multipart/form-data">
                 @csrf
                  
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">Company name</label>

                    <div class="col-sm-8">
                     <select class="form-control" name="company_id">
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
                      <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 control-label">Days</label>

                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="days">
                    </div>
                </div>
               
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Description</label>
                     <div class="col-sm-8">
                      <textarea class="form-control" name="description" ></textarea>
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
