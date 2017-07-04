<invoice>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-6">
                <input id="client" class="form-control typeahead" type="text" placeholder="Cliente" />
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="text" placeholder="Ruc" readonly value="{ruc}" />
            </div>
            <div class="col-xs-4">
                <input class="form-control" type="text" placeholder="Dirección" readonly value="{address}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="text" placeholder="Cantidad" />
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">S/.</span>
                <input class="form-control" type="text" placeholder="Precio" value="{price}" />
            </div>
        </div>
        <div class="col-xs-1">
            <button  class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th style="width:100px;">Cantidad</th>
            <th style="width:100px;">P.U</th>
            <th style="width:100px;">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button  class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{name}</td>
            <td class="text-right">{quantity}</td>
            <td class="text-right">$ </td>
            <td class="text-right">$ </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ </td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">$ </td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right"></td>
        </tr>
        </tfoot>
    </table>
            <script>
           var self = this;
           self.on('mount', function()  {

           __clientAutocomplete();
           __productAutocomplete();
           })
          function __clientAutocomplete(){
            var client = $("#client"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findclient?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = client.getSelectedItemData();
                        self.client_id = e.id;
                        self.ruc = e.ruc;
                        self.address = e.address;

                        self.update();
                    }
                }
            };

            client.easyAutocomplete(options);
        }
        
        function __productAutocomplete(){
            var product = $("#product"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findproduct?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.product_id = e.id;
                        self.price = e.price;

                        self.update();
                    }
                }
            };

            product.easyAutocomplete(options);
        }
    </script>

</invoice>