@extends('layouts.app')

@section('content')

<a href="/ulasan/tambah/$restoran_id" class="btn btn-primary" > +</a>

	<br/>
	<br/>
	<table class="table">
		<thead class="table-active">
		<tr>
            <th>No</th>
			<th>Name</th>
			<th>Review</th>
			<th>Option</th>
		</tr>
		</thead>
		@foreach($ulasan as $r)	
		<tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->name }}</td>
			<td>{{ $r->review }}</td>
			<td>
				<a href="/ulasan/edit/{{ $r->id }}" class="btn btn-warning" >Edit</a>
				|
				<a href="/ulasan/hapus/{{ $r->id }}" class="btn btn-danger" >Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>



@endsection