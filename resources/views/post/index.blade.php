@extends('app')

@section('content')
<a class="navbar-brand" href="{{ asset('mypost') }}">My Post</a>
<div class="container">
	<div class="row msg">
	@if (Session::has('update_message'))
    <div class="alert alert-info">{{ Session::get('update_message') }}</div>
	@endif
	@if (Session::has('create_message'))
		<div class="alert alert-info">{{ Session::get('create_message') }}</div>
	@endif
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">my post
				<span class="pull-right"><button type="button" id="postmodal" class="btn btn-default btn-sm">Create Post</button></span>
			</div>
			</div>
		</div>
	</div>
	<?php if(count($post)==0){ ?>
		<div class="col-md-10 col-md-offset-1"><h3>No records found!!</h3></div>
	<?php }else{ ?>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th style="width:60px;">Sr No.</th>
							<th style="width:158px;">
								Name
							</th>
							<th>
								Description
							</th>
							<th>
								Username
							</th>
							<th>
								Created at
							</th>
							<th>
								Action
							</th>
						</tr>
						
					</thead>
					<tbody>
						@foreach ($post as $data)
						<tr id="tr_{{ $data->id }}">
							<td>{{ $data->id }}</td>
							<td>{{ $data->name }}</td>
							<td>{{$data->description }}</td>
							<td>{{$data->username }}</td>
							<td>{{$data->created_at }}</td>
							<td>
								<a title="update" href="<?php echo route('get_post','');  ?>/{{$data->id}}">Update </a> |
								<a title="delete" onclick="deletePost({{ $data->id }})">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
                </table>
            </div>
        </div>
	<?php } ?>
		<!-- Modal -->
        <div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close close_form" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Post</h4>
                    </div>
                    <div class="modal-body">
                        <form id="post_form" method="post"  action="<?php echo route('addpost') ?>">
							<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="form-label"> Name</label>
                                <input type="text" id="name" class="form-control" name ="name" maxlength="50" placeholder="Name">
                            </div>
							<div class="form-group">
                                <label class="form-label"> Description</label>
                                <input type="text" class="form-control" id="description" name = "description" maxlength="50" placeholder="Description">
                            </div>
                            <button type="button" onclick="validate();" class="btn btn-default">Submit</button>
                            <button class="btn btn-default close_form" type="button" >Cancel</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
</div>
 <script>
	 $('#postmodal').click(function(){
				$('#PostModal').modal();
			});
	$('.close_form').click(function(){
				$('#PostModal').modal('hide');
			});
	function deletePost(id)
	{
		if (confirm("Are you sure you want to delete?")){
		$.ajax({
					type:'POST',
					url:'delete_post',
					data:{"post_id":id,"_token":$('#_token').val()},
					success:function(data) 
					{
						if(data)
						{
							$('.alert').remove();
							$('.msg').before('<div class="alert alert-info">Post Deleted Successfully.</div>');
							$('#tr_'+id).remove();
							// console.log($('.row'));
						}else{
							alert("problem occured");
							}
					}
					
				});
		}
		
	}
	function validate()
	{
	var name = $('#name').val();
	var description = $('#description').val();
	$('.error').remove();
		 if (name=='')
		{
			$("#name").after('<span class="error">Please enter your name</span>');
		}
		if(description==''){
			$("#description").after('<span class="error">Please enter description</span>');
		}
			else{
			$('#post_form').submit();
			}
		}
 </script>
@endsection