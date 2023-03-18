<?php 
    $q = $this->db->query("select * from norek")->row();
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
                <div class="card-header bg-info text-light">
                    Setting Nomor Rekening
                </div>
                <div class="card-body table-responsive">
                <form action="main/setrek" id="save" method="post" enctype="multipart/form-data">
      
                    <table class="table">
                        <tr>
                            <td>Atas Nama </td>
                            <td>
                                <input type="text" class="form-control" required value="<?php echo $q->nama ?>" name="nama">
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Rekening </td>
                            <td>
                                <input type="number" class="form-control" required value="<?php echo $q->norek ?>" name="norek">
                            </td>
                        </tr>
                        <tr>
                            <td>Bank </td>
                            <td>
                                <input type="text" class="form-control" required name="bank" value="<?php echo $q->bank ?>">
                            </td>
                        </tr>
                        
                        <tr>
                          <td></td>
                          <td>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                          </td>
                        </tr>
                    </table>
</form>
                </div>
                </div>
          </div>
        </section>
      
      </div>
