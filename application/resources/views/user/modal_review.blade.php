<div class="modal fade" id="detail">
  <div class="modal-dialog" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">
          Review Produk
        </h5>

      </div>
      <div class="modal-body">
        <table class="table table-responsive">
          @foreach($data['order'] as $order)
            <tr>
              <th>{{ucwords($order->product->name)}}</th>
              <td>
                <textarea rows="5" placeholder="Berikan testimoni Anda" id="review"></textarea>
                <div class="col-sm-12">
                  <input id="input-id" type="text" class="rating" min=1 data-step="1" max=5 data-size="xs">
                </div>
              </td>
              <td><button type="button" id="{{$order->product->id}}" class=" btn btn-mini btn-primary">Kirim Review</button></td>
            </tr>
          @endforeach

        </table>
        
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
    $(".rating").rating();
});
</script>