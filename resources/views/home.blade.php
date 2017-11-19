@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body home">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to the FoxTales!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay_search">
	<div class="container">
		<div class="row">
			<div class="form_search-warp">
				<form method="GET" action="/results">
					<input class="overlay_search-input" name="query" placeholder ="Type and hit Enter..." type="text">
					<a href="#" class="overlay_search-close">
						<span></span>
						<span></span>
					</a>
				</form>	
			</div>
		</div>
	</div>
</div>
@endsection
