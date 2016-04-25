<div class="control-group">
    <label for="product_options" class="control-label">Size</label>

    <div class="controls">
        <input type="hidden" value="{{$data['product']->id}}" id="tmp_id" name="tmp_id"></input>
        <input type="hidden" value="{{$data['color']}}" id="tmp_col" name="tmp_col"></input>
        <div class="controls">
        <select name="size" id="size" class="span12">
            @foreach($data['reverse'] as $key => $value)
                        <option value="{{$key}}">{{strtoupper($key)}}</option>
            @endforeach
        </select>
        </div>
        @foreach($data['reverse'] as $key => $value)
                        <input type="hidden" id="{{$key}}" value="{{$value}}"></input>
            @endforeach
    </div>
</div>
<div class="control-group">
    <label for="product_options" class="control-label">Jumlah</label>
    <div class="controls qty_size">
        <input type="number" id="quantity" name="quantity" min="1" value="1" class="span12"></input>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        var product_id = $('#tmp_id').val();
        var size = $('#size').val();
        var qty = $('#' + size).val();
        $('#quantity').attr("max", qty);
        
        $('#size').change(function(){
            var size = $('#size').val();
            var qty = $('#' + size).val();
            $('#quantity').attr("max", qty);            
        });

        $('#quantity').change(function(){
            var max = this.max;
            var min = this.min;
            var size = $('#size').val();
            if ($('#quantity').val() > max) {
                alert("Maaf persediaan untuk ukuran " + size +" tersisa " + max + " pcs");
                $('#quantity').val(max);
            }else if ($('#quantity').val() < min) {
                alert("Pembelian minimal " + min + " pcs");
                $('#quantity').val(min);
            }
        });
    });
</script>