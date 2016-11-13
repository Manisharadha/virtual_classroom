@extends('layouts.app')


@section('content')



<section class="bg-dark">
    <div class="container">
        <div class="row p-t-xxl">
            <div class="col-sm-8 col-sm-offset-2 p-v-xxl text-center">
                <h1 class="h1 m-t-l p-v-l">{{ $course->name }}</h1>
            </div>
        </div>
    </div>
</section>



<section class="p-v-xxl bg-light">
    <div class="row p-t-xxl">
    	<div class="container">
			@if(count($course) > 0)
			<div class="panel">
				<div class="item img-bg img-info">
					<div class="top wrapper-lg w-full">
						<div class="pull-right m-t-xxs">
							<a href="" class="m-r-sm text-white"><i class="fa fa-heart-o"></i> 36K</a>
							<a href="" class="text-white"><i class="icon-eye"></i> 313K</a>
						</div>
						<div class="clear m-b s">
							<a class="pull-left thumb-xxs m-r-sm " herf=""> <img src="imgs/a0.jpg" alt="..." class="img-full img-circle"> </a>
							<div class="clear m-t-xs p-t-2x">
								<p class="h6"> <a href="" class="text-white">Gifaree Evan</a></p>
							</div>
						</div>
					</div>
					<div class="bottom wrapper-lg w-full">
						<div class="col-md-8">
							<h4 class="h4 text-inline"><a class="text-white" href="">{{ $course->name }}</a></h4>
						</div>
						<div class="col-md-4">
							@if(Auth::check())
								@if(Auth::user()->role_id == 1)
							    <div class="col-md-8 col-md-offset-4">
							      	 <form action="{{ url('course') }}/{{ $course->id }}/enroll" method="get">
										<div class="form-group">
											<button type="submit" class="form-control btn btn-primary" value="Enroll">Enroll</button>
										</div>
							      	</form>
							    </div>
							    @endif
							@else
								<div class="alert alert-notice">
									You must <a href="{{ url('login') }}">login</a> to enroll in this course!
								</div>
						    @endif
					    </div>
					</div>
					<img class="img-full single-course-public" src="imgs/c6.jpg">
				</div>
				<div class="wrapper b-b">
					<p class="m-b-none">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque
						quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum
						ullamcorper sodales nisi nec condimentum. Mauris convallis mauris
						at pellentesque volutpat.
					</p>
				</div>
				<div class="wrapper-lg">
					<a href="" class="m-r-xl"><span>23</span> Comments</a>
					<a href=""><span>434</span> Shares</a>
					<a class="pull-right" href=""><i class="icon-speech fa-2x text-muted pos-abt m-l-n-xs"></i> <span class="m-l-xl">leave a comment</span></a>
				</div>
			</div>
			@endif

		</div>
	</div>
</section>


@endsection