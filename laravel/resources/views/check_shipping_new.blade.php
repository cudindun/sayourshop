<?php $result = unserialize($data['cost_data'])?>
<option value="">-- Silahkan Pilih --</option>
@foreach( $result as $key => $value )
	@if($result[$key]->service == 'OKE' || $result[$key]->service == 'CTCOKE')
		<option class="service" id="{{$result[$key]->service}}" value="{{$result[$key]->cost[0]->value * ceil($data['weight']/1000)}}">OKE (Rp. {{ number_format($result[$key]->cost[0]->value * ceil($data['weight']/1000), 0, ",", ".") }})</option>
	@elseif($result[$key]->service == 'REG' || $result[$key]->service == 'CTC')
		<option class="service" id="{{$result[$key]->service}}" value="{{$result[$key]->cost[0]->value * ceil($data['weight']/1000)}}">REG (Rp. {{ number_format($result[$key]->cost[0]->value * ceil($data['weight']/1000), 0, ",", ".") }})</option>
	@elseif($result[$key]->service == 'YES' || $result[$key]->service == 'CTCYES')
		<option class="service" id="{{$result[$key]->service}}" value="{{$result[$key]->cost[0]->value * ceil($data['weight']/1000)}}">YES (Rp. {{ number_format($result[$key]->cost[0]->value * ceil($data['weight']/1000), 0, ",", ".") }})</option>
	@endif
@endforeach
