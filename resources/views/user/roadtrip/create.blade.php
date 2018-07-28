@extends('layouts.app')


@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(count($errors) > 0)


<ul class="list-group">

	@foreach($errors->all() as $error)
	
		<li class="list-group-item text-danger">
		
			{{ $error }}
		
		</li>
	
	@endforeach
	
</ul>

@endif

<div class="card" align="center">

  <div class="card-body">
  
    <h3 class="card-title">Create new Road Trip</h3>
    
    <p class="card-text">Give a name to your road trip and upload a GPX file</p>
    
    <form action="{{ route('roadtrip.store') }}" method="POST" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		
    		<div class="form-group col-md-4">
    		
    			<label for="name">Name</label>
    			
    			<input type="text" name="name" class="form-control">
    		
    		</div>
    		
    		<div class="form-group col-md-3">
    		
    			<label for="file">Select file</label>
    			
    			<input type="file" name="file" class="form-control">
    		
    		</div>
    		
    		<div class="form-group">
    		
				<button class="btn btn-primary" type="submit">Create Road Trip</button>
    		
    	    </div>	
    		
    </form>
    

    
    
    
  </div>
  
</div>


@stop