<option value="">-- Silahkan Pilih --</option>
@foreach( $data['subcategory'] as $subcategory )
    <option value="{{ $subcategory->id }}">{{ $subcategory->subname }}</option>
@endforeach