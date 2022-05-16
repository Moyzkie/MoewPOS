<div class="card p-3 mb-3 ">
           <div class="invoice p-3 mb-3">
             <div class="row">
               <div class="col-12">
                 <h5>
                   <i class="fas fa-globe"></i>
                    Meow
                    <small class="float-right">From: <?= $date['min']?> - <?= $date['max']?> </small>
                 </h5>
               </div>
             </div>
             <div class="row">
                <div class="col-12 table-responsive">
                  <table id="report"class="table table-striped">
                    <thead>
                    <tr>
                      <th>Order#</th>
                      <th>Product Name</th>
                      <th>Order Date</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($result->result() as $row){?>
                    <tr>
                    <td><?=$row->order_id?></td>
                      <td><?=$row->name?></td>
                      <td><?=$row->order_date?></td>
                      <td><?=$row->qty?></td>
                      <td><?=$row->price?></td>
                      <td><?=$row->total?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table" >
                      <thead>
                        <tr>
                        <th id = "total" style="width:50%">Total Sale</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php foreach ($totalSale->result() as $totalSales){?>
                         <td><h1 class="badge  badge-lg  bg-success"><?=$totalSales->totalSale?></h1></td>
                        <?php }?>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <script>
             window.addEventListener("load", window.print());
            </script>