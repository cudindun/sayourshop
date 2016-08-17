<table class="table">
	<?php $result = unserialize($data['cost_data'])?>
	@foreach ($result as $key => $value)
		<tr>
			<td>{{$result[$key]->service}} {{$result[$key]->cost[0]->etd}} hari </td>
			<td class="pull-right">Rp. {{ number_format($result[$key]->cost[0]->value, 0, ",", ".") }}</td>
		</tr>
	@endforeach
</table>