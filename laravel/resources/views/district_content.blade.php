<option value="">-- Silahkan Pilih --</option>
@foreach( $data['district_data'] as $district )
    <option value="{{ $district->id }}">{{ $district->name }}</option>
@endforeach