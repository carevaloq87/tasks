@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($dutties->name) ? $dutties->name : 'Dutties' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('dutties.dutties.destroy', $dutties->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('dutties.dutties.index') }}" class="btn btn-primary" title="Show All Dutties">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('dutties.dutties.create') }}" class="btn btn-success" title="Create New Dutties">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('dutties.dutties.edit', $dutties->id ) }}" class="btn btn-primary" title="Edit Dutties">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Dutties" onclick="return confirm(&quot;Click Ok to delete Dutties.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $dutties->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $dutties->description }}</dd>

        </dl>

    </div>
</div>

@endsection