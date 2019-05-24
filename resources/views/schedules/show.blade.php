@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Schedules' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('schedules.schedules.destroy', $schedules->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('schedules.schedules.index') }}" class="btn btn-primary" title="Show All Schedules">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('schedules.schedules.create') }}" class="btn btn-success" title="Create New Schedules">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('schedules.schedules.edit', $schedules->id ) }}" class="btn btn-primary" title="Edit Schedules">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Schedules" onclick="return confirm(&quot;Click Ok to delete Schedules.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Completed</dt>
            <dd>{{ ($schedules->completed) ? 'Yes' : 'No' }}</dd>
            <dt>Live</dt>
            <dd>{{ optional($schedules->Life)->id }}</dd>
            <dt>Duttie</dt>
            <dd>{{ optional($schedules->Dutty)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $schedules->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $schedules->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection