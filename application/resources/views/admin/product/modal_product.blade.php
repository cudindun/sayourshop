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
                <th>Gambar</th>
                  <td>: 
                    <?php $image = unserialize($data['product']->image);?>
                    @foreach($image as $images => $value)
                      <img width="10%" height="10%" src="{{url('application/storage/photo_product/'.$value)}}">
                    @endforeach
                  </td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>: {{$data['product']->name}}</td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td>: {{ date_format(date_create($data['product']->created_at), "d M Y")}}</td>
              </tr>
              <tr>
                <th>Kategori</th>
                <td>: {{$data['product']->category->name}}</td>
              </tr>
              <tr>
                <th>Subkategori</th>
                <td>: {{$data['product']->subcategory->subname}}</td>
              </tr>
              <tr>
                <th>Harga</th>
                <td>: {{$data['product']->price}}</td>
              </tr>
              <tr>
                <th>Jumlah</th>
                <td>: {{$data['product']->quantity}}</td>
              </tr>
              <tr>
                <th>Terjual</th>
                <td>: {{$data['product']->sold}}</td>
              </tr>
              <tr>
                <th>Berat</th>
                <td>: {{$data['product']->weight}}</td>
              </tr>
              <tr>
                <th>Deskripsi</th>
                <td>: {{$data['product']->desc}}</td>
              </tr>
            </table>
          </div>

          <div class="tab-pane fade" id="detail-atribute">
            <table class="table table-bordered table-responsive" style="text-align: center;">
              <thead>
                <tr>
                  @foreach($data['size'] as $size)
                    <th style="text-align: center;background-color: #3c8dbc;">{{$size->size}}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach($data['size'] as $quantity)
                  <td style="text-align: center;">{{$size->quantity}}</td>
                  @endforeach
                </tr>
              </tbody>
            </table>
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
                <tr>
                  @foreach($data['order'] as $order)
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
                  @endforeach
                </tr>
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
    $('#detail').modal('show');

    $(function () {
        $("#order_table").DataTable();
      });
});
</script>