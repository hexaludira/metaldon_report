<!DOCTYPE html>
<head>
    <title>Select berhubungan dengan codeigniter dan ajax</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <br/>
    <?php echo base_url();?>
    <div class="col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3">Kategori</label>
                    <div class="col-md-8">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Sub Kategori</label>
                    <div class="col-md-8">
                        <select name="subkategori" class="subkategori form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>
                     
                </div>
            </form>
            <hr/>
            <p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#kategori').select2({
    			placeholder: "Pilih Kategori",
    			language: "id"
    		});

    		$('#kategori').change(function(){
    			var id = $(this).val();
    			$.ajax({
    				url : "<?php echo base_url();?>C_Index/get_subkategori",
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success : function(response){
                        var html = '';
                        var i;
                        for(i=0; i<response.length; i++){
                            html += '<option>'+response[i].subkategori_nama + '</option>';
                        }
                        $('.subkategori').html(html);
                    }

    			});
    		})

    	});
    </script>