<?php $result = unserialize($data['cost_data'])?>
<option value="">-- Silahkan Pilih --</option>
@foreach( $result as $key => $value )
    <option class="service" id="{{$result[$key]->service}}" value="{{$result[$key]->cost[0]->value * ceil($data['weight']/1000)}}">{{$result[$key]->service}} (Rp. {{ number_format($result[$key]->cost[0]->value * ceil($data['weight']/1000), 0, ",", ".") }})</option>
@endforeach
