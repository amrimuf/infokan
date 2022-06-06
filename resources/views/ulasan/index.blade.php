@extends('layouts.app')

@section('content')

<a href="/ulasan/tambah/{{ $id }}" class="btn btn-primary" > +</a>

	<br/>
	<br/>
	<table class="table">
		<thead class="table-active">
		<tr>
            <th>No</th>
			<th>Direview oleh</th>
			<th>Review</th>
			<th>Option</th>
		</tr>
		</thead>
		@foreach($review as $r)
		@if($r->restoran_id == $id)	
		<tr>
			<td>{{ $loop->iteration }}</td>
			@foreach($user as $u)
			@if($r->user_id == $u->id)
            <td>{{ $u->name }}</td>
			@endif
			@endforeach
			@if($r->restoran_id == $id)
			<td>{{ $r->review }}</td>
			@endif
			<td>
				{{-- {{ $r->id }} --}}
				<a href="/ulasan/edit/{{ $r->id }}" class="btn btn-warning" >Edit</a>
				|
				<a href="/ulasan/hapus/{{ $r->id }}" class="btn btn-danger" >Hapus</a>
			</td>
		</tr>
		@endif
		@endforeach
	</table>



@endsection