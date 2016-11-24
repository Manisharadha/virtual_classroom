@extends('layouts.app')

@section('content')
	
<section class="bg-dark">
	<div class="container">
	    <div class="row p-t-xxl">
	        <div class="col-sm-8 col-sm-offset-2 p-v-xxl text-center">
	            <h1 class="h1 m-t-l p-v-l">Add Book to Library</h1>
	        </div>
	    </div>
	</div>
</section>

    
<section class="p-v-xxl bg-light">
    <div class="container">
        <div class="row p-t-xxl bg-info content">
            <div class="col-md-10 col-md-offset-1">

            @if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
            @if($errors->has())
				@foreach ($errors->all() as $error)
				  <div class="alert alert-danger">{{ $error }}</div>
				@endforeach
			@endif



        
			<div class="create-library">

				@if($is_enabled == 'yes')
				<form class="form-horizontal" role="form" action="{{ url('library/save') }}" method="post" enctype="Multipart/form-data">
				    {{ csrf_field() }}
				   
				    <div class="form-group">
				      <label class="control-label col-sm-2" for="email">Course Name</label>
				      <div class="col-sm-10">
				         <select name="course_id" id="" class="form-control" required="">
				         	@foreach($courses as $course)
				         	    <option value="{{ $course->id }}">{{ $course->title }}</option>
				         	 @endforeach
				         </select>
				      </div>
				    </div>

				    <div class="form-group">
				    	<label for="class_number" class="col-sm-2 control-label"></label>
				    	<div class="col-sm-10">
				    		<input type="hidden" name="uploader_id" class="form-control" value="{{ \Auth::user()->id }}">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<label for="class_number" class="col-sm-2 control-label">Book Name</label>
				    	<div class="col-sm-10">
				    		<input type="text" name="book_name" class="form-control" required="">
				    	</div>
				    </div>
				     <div class="form-group">
				      <label class="control-label col-sm-2" for="author_name">Author Name</label>
				      <div class="col-sm-10">
				        <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Enter name of the author" required="">
				      </div>
				    </div>
				    <div class="form-group">
				    	<label for="class_number" class="col-sm-2 control-label">Add the book ( PDF )</label>
				    	<div class="col-sm-10 input-append date">
				    		<input type="file" name="book_link" class="control" id="" required="">
				    	</div>
				    </div>

				    <div class="form-group">
				    	<label for="class_number" class="col-sm-2 control-label">Online link ( optional )</label>
				    	<div class="col-sm-10">
				    		<input type="text" name="online_link" class="form-control">
				    	</div>
				    </div>
				    
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" class="btn btn-default">Submit</button>
				      </div>
				    </div>
				  </form>
				  @else
				  	<span class="alert-danger bg-danger">Only teachers who have ongoing registered courses can add books to the library!</span>

				  @endif

            </div>
        </div>
    </div>
</section>


@endsection