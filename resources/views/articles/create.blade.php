@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Article</div>
                <div class="panel-body">
                    <form action="/articles" method="POST">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                        <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control"></textarea>
                        </div>
                        <div class="checkbox">
                            <label for="live"><input type="checkbox" name="live" />Live</label>
                        </div>
                        <div class="form-group ">
                            <label for="post_on">Post on </label>
                            <input type="datetime-local" name="post_on" class="form-control" /> 
                        </div>
                        {{csrf_field()}}
                        <button class="btn btn-success pull-right" type="submit">Post</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

