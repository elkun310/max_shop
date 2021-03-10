<div id="result" class="panel panel-default" style="width:400px; position:absolute; left:180px; top:55px; z-index:1; display:none">
    <ul style="margin-top:10px; list-style-type:none;" id="memList">
    
    </ul>
</div>
@if(count($members) > 0)
	@foreach($members as $member)
		<li><a href="{{ url('member/'.$member->id) }}">{{ $member->firstname }} {{ $member->lastname }}</a></li>
	@endforeach
@else
	<li>No Results Found</li>
@endif