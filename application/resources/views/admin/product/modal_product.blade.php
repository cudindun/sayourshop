<style type="text/css">
th{
  width: 100px;
}

</style>
<div class="modal fade" id="detail" >
  <div class="modal-dialog" style="width: 70%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">
          Detail Product
        </h4>
      </div>
      <div class="modal-body" style="padding: 0px;">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#detail-product" data-toggle="tab">Produk</a></li>
          <li><a href="#detail-atribute" data-toggle="tab">Atribut</a></li>
          <li><a href="#detail-order" data-toggle="tab">Order</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade in active" id="detail-product">
            <table class="table table-responsive">
              <tr>
                <td colspan="4" align="center"><h4>{{ucwords($data['product']->name)}} <font size="-1"><i>({{ date_format(date_create($data['product']->created_at), "d M Y")}})</i></font></h4></td>
              </tr>
              <tr>
                  <td colspan="4" align="center">
                    <?php $image = unserialize($data['product']->image);?>
                    @foreach($image as $images => $value)
                      <img width="15%" src="{{url('application/storage/photo_product/'.$value)}}">
                    @endforeach
                  </td>
              </tr>
              
              <tr>
                <th>Harga</th>
                <td>: {{$data['product']->price}}</td>
                <th>Berat</th>
                <td>: {{$data['product']->weight}}</td>
              </tr>
              <tr>
                <th>Kategori</th>
                <td>: {{$data['product']->category->name}}</td>
                <th>Jumlah</th>
                <td>: {{$data['product']->quantity}}</td>
              </tr>
              <tr>
                <th>Subkategori</th>
                <td>: {{$data['product']->subcategory->subname}}</td>
                <th>Terjual</th>
                <td>: {{$data['product']->sold}}</td>
              </tr>
              <tr>
                <td colspan="4">{{$data['product']->desc}}</td>
              </tr>
            </table>
          </div>

          <div class="tab-pane fade" id="detail-atribute">
            <?php $properties = unserialize($data['product']->properties);?>

            <div class="col-sm-12">
            <input type="hidden" id="product_id" value="{{$data['product']->id}}"></input>
            <br>
              @foreach($properties as $key => $value)
                <table class="table-responsive col-sm-4">
                  <tr>
                    <th rowspan="{{count($value)+1}}" style="background-color: #367fa9;color: white;text-align: center;min-width: 10px;margin: 10px;">{{ucwords($key)}}</th>
                    <td>
                      @foreach($value as $size => $qty)
                        <tr>
                          <input type="hidden" value="{{$qty}}" id="tmp_{{$size}}"></input>
                          <td style="padding: 10px;">{{strtoupper($size)}}</td>
                          <td>: <input class="qty"  type="number" value="{{$qty}}" id="{{$size}}" name="{{$key}}" ></input> pcs</td>
                        </tr>
                      @endforeach
                    </td>
                  </tr>
                </table>
              @endforeach
            </div>
            <div id="attribute"></div>
          </div>

          <div class="tab-pane fade" id="detail-order" style="padding: 10px;">
            <table class="table table-responsive" style="text-align: center;" id="order_table">
              <thead>
                <tr>
                  <th style="text-align: center;">No Invoice</th>
                  <th style="text-align: center;">Atas Nama</th>
                  <th style="text-align: center;">Ukuran</th>
                  <th style="text-align: center;">Jumlah</th>
                  <th style="text-align: center;">Status</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data['order'] as $order)
                <tr>
                    <td>{{$order->order->no_invoice}}</td>
                    <td>{{$order->order->order_name}}</td>
                    <?php $property = unserialize($order->properties);?>
                    <td>
                      @foreach($property as $size => $value)
                        {{$size}} : {{$value}}<br>
                      @endforeach
                    </td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->order->order_status}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-mini" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function()
  {
    var coba = 'tes';
    $('#detail').modal('show');

    $(function () {
        $("#order_table").DataTable();
    });

    $('.properties').click(function()
    {
      var id = this.id;
      var color = this.name;
      $.ajax({
        url: "{!! url('ajax_modal_attr') !!}",
        data: {
          id: id,
          color: color
        },
        method:'GET',
      });
    });

    $('.qty')
    .on('focus', function(){
      var val = $(this).val();
      console.log(coba);
    })
    .change(function()
    {
      var id = this.id;
      var qty = $("#"+id).val();
      var color = this.name;
      console.log(coba);
      // $.ajax({
      //   url: "{!! url('edit_qty') !!}",
      //   data: {
      //     product_id:product_id,
      //     color: color,
      //     id: id,
      //     qty: qty
      //   },
      //   method:'POST',
      // });
    });
});
</script>