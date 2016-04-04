<option value="">-- Silahkan Pilih --</option>
@foreach( $data['city_data'] as $city )
    <option value="{{ $city->id }}">{{ $city->nama }}</option>
@endforeach