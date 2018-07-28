@extends('layouts.app')

@section('content')
<div align="center">
	<div class="card card col-md-8" >
	
		<div class="card">
		
        	<table class="table table-hover">
        		
        		<thead>
        		
            		<th>
            			Road Trip Name
            		</th>
            		         		        				
            	</thead>
            	
            	<tbody>
            	
            		@foreach($roadtrips as $roadtrip)
            		
            			<tr>
            			
            				<td>
            					
            					{{ $roadtrip->name }}
            					
            				</td>
            				
            				<td>
            				
            					<a href="{{ route('roadtrip.map',$roadtrip->id) }}" class="btn btn-xs btn-info">
            					
            						<span class="glyphicon glyphicon-pencil">Click for the Map</span>
            					
            					</a>
            				
							</td>
							
            				
							</td>
            				            			
            			</tr>
            			 			
            		@endforeach
            	
            	</tbody>
            			
        	</table>
		
		</div>
	
	</div>
	
</div>		
@stop