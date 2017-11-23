@section('content')

    <div class="panel panel-default">

        {!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<a href="{{ url($link.'/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>

<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{!! Form::close() !!}

        <table class="table table-bordered table-hover" >
            <thead>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach($searches as $trade)
                <tr>
                    <td>{{ $trade->book_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop