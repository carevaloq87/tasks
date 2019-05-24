@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($tasks->name) ? $tasks->name : 'Tasks' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('tasks.tasks.destroy', $tasks->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('tasks.tasks.index') }}" class="btn btn-primary" title="Show All Tasks">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('tasks.tasks.create') }}" class="btn btn-success" title="Create New Tasks">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('tasks.tasks.edit', $tasks->id ) }}" class="btn btn-primary" title="Edit Tasks">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Tasks" onclick="return confirm(&quot;Click Ok to delete Tasks.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $tasks->name }}</dd>
            <dt>Duttie</dt>
            <dd>{{ optional($tasks->Dutty)->id }}</dd>

        </dl>

    </div>
</div>

@endsection