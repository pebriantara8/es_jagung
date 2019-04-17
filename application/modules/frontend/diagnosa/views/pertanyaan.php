      
		  <div class="container">
			  <div class="form-wrapper">
                <div class="text-center">
                    <h2><strong><?=$list_premis['nama_premis_kategori']?></strong></h2>
                    <h4><?=$list_premis['nama_premis']?>?</h4>
                </div>
                    <form action="<?=base_url()?>diagnosa/next" method="post">
                    <input type="hidden" name="p_id" value="<?=$list_premis['premis_id']?>">
                        <label for="choice-1">
                            <input type="radio" id="choice-1" name="choice" value="1" required/>
                            <div>
                                Ya
                                <!-- <span>Yakin?</span> -->
                            </div>
                        </label>
                        
                        <label for="choice-2">
                            <input type="radio" id="choice-2" name="choice" value="2" />
                            <div>
                                Tidak
                                <!-- <span>penyakit.</span> -->
                            </div>
                        </label>

                        <button type="submit">Lanjut</button>
                    </form>
                </div>
          </div>