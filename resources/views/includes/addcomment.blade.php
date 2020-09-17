

<!-- Add -->
<div class="modal fade  bd-example-modal-lg" id="addcomment">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
              <h4 class="modal-title"><b>Add comment</b></h4>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="{{ route('comments.store')}}" enctype="multipart/form-data">
                 @csrf
              
          		    <div class="form-group">
                    <label  class="col-sm-4 control-label">Url</label>

                    <div class="col-sm-8">
                      <input type="url" class="form-control" name="url">
                    </div>
                  </div>
               
                 <div class="form-group">
                    <label  class="col-sm-4 control-label">Body</label>
                     <div class="col-sm-8">
                      <textarea class="form-control" name="body"></textarea>
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
