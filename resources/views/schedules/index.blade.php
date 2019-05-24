@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Schedules</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('schedules.schedules.create') }}" class="btn btn-success" title="Create New Schedules">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($schedulesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Schedules Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Completed</th>
                            <th>Live</th>
                            <th>Duttie</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($schedulesObjects as $schedules)
                        <tr>
                            <td>{{ ($schedules->completed) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($schedules->Life)->id }}</td>
                            <td>{{ optional($schedules->Dutty)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('schedules.schedules.destroy', $schedules->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('schedules.schedules.show', $schedules->id ) }}" class="btn btn-info" title="Show Schedules">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('schedules.schedules.edit', $schedules->id ) }}" class="btn btn-primary" title="Edit Schedules">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Schedules" onclick="return confirm(&quot;Click Ok to delete Schedules.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $schedulesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection