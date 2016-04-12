@extends('app')
@section('content')
<a class="navbar-brand" href="{{ asset('mypost') }}">My Post</a>
<div class="container">
<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">my post
				<span class="pull-right"><a class="btn btn-default btn-sm" href="{{ asset('mypost') }}">Back</a></span>
			</div>
			</div>
		</div>
	</div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    <form id="update_post_form" method="post" action="<?php echo route('updatepost')?>">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="form-label"> Title</label>
                                <input type="text" id="name" class="form-control" name ="name" maxlength="50" value="{{$post->name}}" placeholder="Name">
                            </div>
							<div class="form-group">
                                <label class="form-label"> Description</label>
                                <input type="text" id="description" class="form-control" name = "description" value="{{$post->description}}" maxlength="50" placeholder="Description">
                            </div>
							<input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="button" onclick="validate();" class="btn btn-default">Update</button>
                            <a class="btn btn-default" href="{{ asset('mypost') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
	<script>
	function validate()
	{
	var name = $('#name').val();
	var description = $('#description').val();
	$('.error').remove();
		 if (name=='')
		{
			$("#name").after('<span class="error">Please enter title!</span>');
		}
		if(description==''){
			$("#description").after('<span class="error">Please enter description</span>');
		}
			else{
			$('#update_post_form').submit();
			}
		}
	</script>
@endsection