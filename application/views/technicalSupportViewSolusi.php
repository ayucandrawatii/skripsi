<?php foreach ($listSolusi as $key => $post): ?>
        
          <!-- <label><?php print_r($hasil);?></label></br> -->

          <label>GEJALA</label></br>
          <p><?php echo $post->gejala;?></p></br>
          <label>KEMUNGKINAN PENYEBAB</label></br>
          
          <td><?php echo $post->kemungkinanPenyebab;?></td></br></br>
         <label>SOLUSI</label></br>
          <td><?php echo $post->solusi;?></td></br>
          <label>Waktu Proses : <?php echo $waktu;?> </label>
          <td>
            <div class="btn-group">
              <!-- <a href="<?php echo base_url('AdminEdit/edit/').$post->id ?>" type="button" class="btn btn-default">Solusi</a> -->
            </div>
          </td>
        
      <?php endforeach ?>