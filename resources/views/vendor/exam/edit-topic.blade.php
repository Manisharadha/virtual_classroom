@extends('layouts.app')

@section('content')
<section class="bg-dark">
    <div class="container">
        <div class="row p-t-xxl">
            <div class="col-sm-8 col-sm-offset-2 p-v-xxl text-center">
                <h1 class="h1 m-t-l p-v-l">Edit topic of <b>{{ $course->title }}</b></h1>
            </div>
        </div>
    </div>
</section>

    
<section class="p-v-xxl bg-light">
    <div class="container">
        <div class="row p-t-xxl bg-info content">
        	@include('errors.list')

            <div class="col-md-3">
                <!-- left sidebar -->
                <div class="list-group">
                    <a href="{{ url('teacher/my-course') }}/{{ $course->id }}" class="list-group-item"><< Back to course page</a>
                    <a href="{{ url('exam/course') }}/{{ $course->id }}/topic/all" class="list-group-item">All exam topic</a>
                    <a href="{{ url('exam/course') }}/{{ $course->id }}/topic/new" class="list-group-item">+ Create a new exam topic</a>
                </div>
            </div>

            <div class="col-md-9">
                <form class="form-horizontal" method="post" action="{{ url('exam/course') }}/{{ $course->id }}/topic/{{ $topic->id }}/update">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="topic-name">Name of Topic</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" required="" placeholder="Name of the exam topic" value="{{ $topic->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="course" value="{{ $course->id }}">
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="topic-name">Duration</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="duration" required="" placeholder="Duration of the exam in minutes" value="{{ $topic->duration }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="topic-name">Active</label>
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="status" value="1" checked="checked">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 text-center">
                            <button type="submit" class="btn btn-primary"> Update exam topic </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection