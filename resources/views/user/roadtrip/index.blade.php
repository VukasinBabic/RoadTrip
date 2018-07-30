@extends('layouts.app')

@section('content')
<div align="center" class="no-gutters">
	<div class="card card col-md-5" >
	
		<div class="card">
		
        	<table class="table table-hover mb-0">
        		
        		<thead>
        		
            		<th>
            			Road Trip Name
            		</th>
            		         		        				
            	</thead>
            	
            	<tbody>
            	
            		@foreach($roadtrips as $roadtrip)
            		
            			<tr >
            			
            				<td class="col-md-6" style="background-color: #bfbfbf">
            					
            					<p class="font-weight-bold">{{ $roadtrip->name }}</p>
            					
            				</td>
            				
            				<td align="center" class="col-md-2">
            				
            					<a href="{{ route('roadtrip.map',$roadtrip->id) }}" class="btn btn-xs">
            					
            						<span class="glyphicon glyphicon-pencil font-weight-bold"  style="color:#595959">Click for the Map</span>
            					
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