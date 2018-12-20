@extends('layouts.app');

@section('content')
<div class="form">
	{{Form::text('Nombre')}}
	{!!Form::select('estados',$estados) !!}

	{!!Form::select('municipios') !!}
	{!!Form::submit('clickme')!!}
</div>
@endsection