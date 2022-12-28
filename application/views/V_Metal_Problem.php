<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Metal & Andon Problem Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/css/selectize.bootstrap4.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.css');?>">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" style="stylesheet"/> -->


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap-4/js/bootstrap.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.4.1/sifter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"></script>
    <script src="<?=base_url('assets');?>/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/js/selectize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

</head>
<body style="margin: 5px;">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="#"><h4>Metal & Andon Problem Report</h4></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <button data-toggle="modal" data-target="#addProblemModal" class="btn btn-success">Tambah Data</button>
                  </li>
                  &nbsp;
                  <li class="nav-item">
                    <a class="btn btn-warning" href="<?php echo base_url().'C_Export_Excel';?>">Export to Excel</a>
                  </li>
                  &nbsp;
                  <li class="nav-item">
                    <a class="btn btn-secondary" href="<?php echo base_url().'C_Laporan';?>">Export to PDF</a>
                  </li>
                </ul>
              </div>
            </nav>
    <div class="card border-secondary mb-3">
        <div class="card-header text-white bg-secondary mb-5 container-fluid">
            
              <!-- <div class="row">
                <div class="col-md-8">
                  <h2>Incident List</h2>
                </div>
                <div class="col-sm-4 float-right">
                  <button data-toggle="modal" data-target="#addIncidentModal" class="btn btn-success">Tambah Data</button>
                  <a class="btn btn-warning" href="<?php echo base_url().'C_Index/export_to_excel';?>">Export to Excel</a>
                  <button class="btn btn-secondary btn_alert">Tes Alert</button>
                </div>
                
              </div> -->
              
      
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" width="100%" id="Metal_Report_Table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Problem</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Repair Date</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_data">
                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
 
    <!-- Modal Tambah-->
    <div id="addProblemModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xl">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Insert New Metal Problem</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
            

          </div>
          <div class="modal-body">
            
				<div class="row">
				  <div class="col-md-12">
				    
				    <div class="card">
				      <div class="card-body">
				          <form class="forms-sample" id="add_data_form" method="post" enctype="multipart/form-data">
				            <div class="row">
				              <div class="col-md-6">
                        <div class="form-group">
                          <label><h5>Date</h5></label>
                           <input type="date" id="problem_date" name="problem_date" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>">

                          <!-- <vuejs-datepicker input-class="form-control" type="text" placeholder="dd mm yyyy" name="incident_date" typeable value="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>"></vuejs-datepicker> -->
                        </div>
                        <div class="form-group">
                          <label><h5>Location</h5></label>
                          <input type="text" class="form-control" id="problem_location" name="problem_location" placeholder="Ex: A01">
                        </div>
                        
				                
                        <div class="form-group">
                          <label><h5>Problem</h5></label>
                          <select id="problem_name" name="problem_name">
                          </select>
                        </div>

                        <div class="form-group">
                          <label><h5>Detail</h5></label>
                          <textarea class="form-control" id="problem_detail" name="problem_detail" rows="5"></textarea>
                          <!-- <input type="" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password"> -->
                        </div>
				                
				                
				              </div>

                      <div class="col-md-6">

                        <div class="form-group">
                          <label><h5>Status</h5></label>
                          <select id="problem_status" name="problem_status">
                          </select>
                        </div>

                       <!-- <div class="form-group">
                          <label><h5>Status</h5></label>
                          <div class="form-check form-check-warning">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="problem_status" class="problem_status" value="Already Fixed" checked>
                              On-Going
                            </label>
                          </div>
                          <div class="form-check form-check-success">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="problem_status" class="problem_status" value="Waiting Material">
                              Done
                            </label>
                          </div>
                          <div class="form-check form-check-danger">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="problem_status" class="problem_status" value="Pending/Need Follow Up">
                              Pending/ Need Follow Up
                            </label>
                          </div>
                        </div> -->

                      <div class="form-group">
                        <label><h5>Repair Date</h5></label>
                         <input type="date" id="problem_repair_date" name="problem_repair_date" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>" >
                      </div>

                         <div class="form-group">
                          <label><h5>Remark</h5></label>
                          <textarea class="form-control" id="problem_remark" name="problem_remark" rows="3"></textarea>
                        </div>
				                
				                <!-- <div class="form-group">
				                  <label><h5>Affected User</h5></label>
				                  <input type="text" class="form-control" id="incident_affected" name="incident_affected" placeholder="Ex: SEA/ Cell A01">
				                </div> -->

				                <div class="form-group">
				                  <label><h5>Picture</h5></label>
				                  <input type="file" ref="file"class="form-control file-upload-info" accept="image/*" onchange="updatePreview(this, 'image-preview')" id="problem_image" name="problem_image">
				                  <button type="button" class="btn btn-link" id="btn_reset_gambar">X Delete Picture</button>
                          <!-- <span class="input-group-append">
				                    <button class="file-upload-browse btn btn-primary" type="button">Choose File</button>
				                  </span> -->
				                </div>
				                <div class="form-group">
				                  <img id="image-preview" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png" class="" width="200" height="150"/>
				                  
                        </div>
				               
				                <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button> -->
				                <!-- <button class="btn btn-light">Cancel</button> -->
				              </div>
				            </div>
				          </form>
				       </div>
				    </div>
				  </div>
				</div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-success" id="btn_add_data">Simpan</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>
    <!----------------------------------------------------------------------------------------- -->


 
    <!------------------------------- Modal Edit ------------------------------------------------->
    <div id="editProblemModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xl">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal">X</button>
            
          </div>
          <div class="modal-body">
            
                <div class="row">
                  <div class="col-md-12">
                    
                    <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" id="edit_data_form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="hidden" id="problem_id_edit" name="problem_id_edit">

                                <div class="form-group">
                                  <label><h5>Date</h5></label>
                                 <input type="date" id="problem_date_edit" name="problem_date_edit" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>" onfocus="(this.type='date')">

                                  <!-- <vuejs-datepicker input-class="form-control" type="text" placeholder="dd mm yyyy" name="incident_date" typeable value="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>"></vuejs-datepicker> -->
                                </div>

                                <div class="form-group">
                                  <label><h5>Location</h5></label>
                                  <input type="text" class="form-control" id="problem_location_edit" name="problem_location_edit" placeholder="Ex: A01">
                                </div>
                                
                                <div class="form-group">
                                  <label><h5>Problem</h5></label>
                                  <select id="problem_name_edit" name="problem_name_edit">
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label><h5>Detail</h5></label>
                                  <textarea class="form-control" id="problem_detail_edit" name="problem_detail_edit" rows="5"></textarea>
                                  <!-- <input type="" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password"> -->
                                </div>
                   
                              </div>
                                

                              <div class="col-md-6">

                                <div class="form-group">
                                  <label><h5>Status</h5></label>
                                  <select id="problem_status_edit" name="problem_status_edit">
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label><h5>Repair Date</h5></label>
                                   <input type="date" id="problem_repair_date_edit" name="problem_repair_date_edit" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>" >
                                </div>

                                <div class="form-group">
                                  <label><h5>Remark</h5></label>
                                  <textarea class="form-control" id="problem_remark_edit" name="problem_remark_edit" rows="3"></textarea>
                                </div>
                                
                        
                                <div class="form-group">
                                  <label><h4>Picture</h4></label>
                                  <input type="file" class="form-control file-upload-info" accept="image/*" onchange="updatePreview(this, 'image-preview-edit')" id="incident_picture_edit" name="problem_image_edit">
                                  <button type="button" class="btn btn-link" id="btn_reset_gambar_edit">X Delete Picture</button>
                                  <!-- <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Choose File</button>
                                  </span> -->
                                </div>
                                <div class="form-group">
                                  <img id="image-preview-edit" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png" class="" width="200" height="150"/>
                                </div>
                                <input type="hidden" id="problem_image_name" name="problem_image_name">
                                
                              
                 
                                <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button> -->
                                <!-- <button class="btn btn-light">Cancel</button> -->
                              </div>
                            </div>
                          </form>
                       </div>
                    </div>
                  </div>
                </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-success" id="btn_update_data">Update</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>

    <!----------------------------- Modal Hapus Data --------------------------------------------->
    <div id="confirmHapusModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal">X</button>
              
          </div>
          <div class="modal-body">
            <h5>Yakin ingin hapus data?</h5>
          </div>

          <div class="modal-footer">
           <button type="button" class="btn btn-danger" id="btn_confirm_hapus">Hapus</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>      
        </div>
      </div>
      
    </div>
    <!-------------------------------------------------------------------------------------------->


    <!------------------------------- Modal Lihat Foto ------------------------------------------->
    <div id="lihatFotoModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Foto</h4>
              <button type="button" class="close" data-dismiss="modal">X</button>
            
          </div>
          <div class="modal-body">
            <img id="tampil_foto" width="100%" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png">
          </div>

          <div class="modal-footer">
           <!-- <button type="button" class="btn btn-danger" id="btn_confirm_hapus">Hapus</button> -->
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>      
        </div>
      </div>
      
    </div>
    <!-------------------------------------------------------------------------------------------->
 
</html>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> -->
<script src="<?= base_url('assets')?>/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">

    function updatePreview(input, target) {
    let file = input.files[0];
    let reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = function () {
      let img = document.getElementById(target);
      img.src = reader.result;
    }
  }


tinymce.init({
  selector: '#incident_detail, #incident_detail_edit',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
  toolbar_sticky: true,
});

    var table;

    $(document).ready(function(){
        //tampil_data();
        
        
        //Server Side Datatables
        table = $('#Metal_Report_Table').DataTable({
          pagingType: 'full_numbers',
          processing: true,
          serverSide: true,
          order : [],
          filter: true,
          fixedHeader : true,
          ajax : {
            url : '<?php echo base_url(); ?>C_Index/ambilDataAjax',
            type : "POST"
          },
          "columnDefs": [ 
          { 
              "targets": [ 0 ], //first column / numbering column
              "orderable": false, //set not orderable
          },
          ],
        });

        //Menambahkan data dan gambar
        // $("#btn_add_data").on('click',function(){
        //   //e.preventDefault();
        //   //$.when(addData()).done(upload_image());
        //   addDataGambar();
        // });

        //Meng-Update Data
        // $("#btn_update_data").on('click',function(e){
        //     e.preventDefault();
        //     $.when(updateData()).done(upload_image_edit());
        // });

        /*=========================== Tambah Data + Gambar Sekaligus =============================*/
        $("#btn_add_data").on('click',(function(e){
              e.preventDefault();
              var form_data = new FormData($('#add_data_form')[0]);
              $.ajax({
                url: '<?php echo base_url(); ?>C_Index/tambahDataGambar',
                type: "POST",
                data: form_data,
                //dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                  $('#problem_date').val("");
                  $('#problem_location').val("");
                  selectize_problem_name.clear();
                  $('#problem_detail').val("");
                  selectize_problem_status.clear();
                  $('#problem_repair_date').val("");
                  $('#problem_remark').val("");
                  reset_field_gambar();
                  $("#addProblemModal").modal('hide');
                  notif_add_data_berhasil();
                  table.ajax.reload(null, false);
                }
              });
            }));
        /*=======================================================================================*/
       

       /*================================= Update Data + Gambar Sekaligus =======================*/
       $("#btn_update_data").on('click', (function(e){
          e.preventDefault();
          var form_data_edit = new FormData($('#edit_data_form')[0]);
          $.ajax({
            url: '<?php echo base_url();?>C_Index/updateDataGambar',
            type: "POST",
            data: form_data_edit,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response){
               $('#problem_date_edit').val("");
               $('#problem_location_edit').val("");
               selectize_problem_name_edit.clear();
               $('#problem_detail_edit').val("");
               selectize_problem_status_edit.clear();
               $('#problem_repair_date_edit').val("");
               $('#problem_remark_edit').val("");
               reset_field_gambar_edit();
               $("#editProblemModal").modal('hide');
               notif_update_data_berhasil();
               table.ajax.reload(null, false);
            }
          });

       }));

       /*========================================================================================*/

        //Coba tampil data dengan ajax
        // function tampil_data_datatable(){
        //     $('#Incident_Table').DataTable({
        //         ajax: {
        //           url: '<?php echo base_url(); ?>C_Index/ambilData',
        //           dataSrc : ''
        //         },
        //                   columns : [
        //                     {data : 'incident_id'},
        //                     {data : 'incident_name'},
        //                     {data : 'incident_date'},
        //                     {data : 'incident_time_begin'},
        //                     {data : 'incident_time_end'},
        //                     {data : 'incident_location'},
        //                     {data : 'incident_detail'},
        //                     {data : 'incident_affected'},
        //                     {data : 'incident_remark'},
        //                     {data : 'incident_status'},
        //                     {data : ''}
        //                   ]

        //         });
        //             // console.log(response);
        //             // var i;
        //             // var no = 0;
        //             // var html = "";
        //             // for(i=0;i < response.length ; i++){
        //             //     no++;
        //             //     $('#Incident_Table').DataTable({
        //             //       columns : [
        //             //         {data : response[i].incident_id},
        //             //         {data : response[i].incident_name},
        //             //         {data : response[i].incident_date},
        //             //       ]

        //             //     });
        //             //                 // + '<td style="width:16.66%;">' + '<span><a href="#" class="btn btn-primary btn_edit"  data-id="'+ response[i].incident_id +'">Edit</a> <button style="margin-left: 5px;" data-id="'+response[i].incident_id +'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
        //             //                 // // + '<td style="width: 16.66%;">' + '<span><button data-toggle="modal" data-target="#editIncidentModal" data-id="'+ no +'" class="btn btn-primary btn_edit">Edit</button> <button style="margin-left: 5px;" data-id="'+response[i].incident_id+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
        //             //                 // + '</tr>';
        //             // }
        //             //$("#tbl_data").html(html);
        //             //$('#Incident_Table').load(window.location.href + " #Incident_Table");
        //     //     }
        //     // });
        // }

    /*================ Selectize Problem Name & Problem Name Edit =========================*/
        var select = $("#problem_name").selectize({
              options: [
                {series: 'LP', value: 'LP Layar Hang/ Mati Total', name: "LP Layar Hang/ Mati Total"},
                {series: 'LP', value: 'LP Baterai Habis', name: "LP Baterai Habis"},
                {series: 'LP', value: 'LP Touch Screen Error', name: "LP Touch Screen Error"},
                {series: 'LP', value: 'LP Motherboard Error', name: "LP Motherboard Error"},
                {series: 'LP', value: 'LP Tidak Menyala', name: "LP Tidak Menyala"},
                {series: 'Sensor', value: 'Sensor Lemah', name: "Sensor Lemah"},
                {series: 'Sensor', value: 'Sensor Tidak Sejajar', name: "Sensor Tidak Sejajar"},
                {series: 'Andon', value: 'Andon Tidak Menyala', name: "Andon Tidak Menyala"},
                {series: 'Andon', value: 'Andon Merah Mati', name: "Andon Merah Mati"},
                {series: 'Andon', value: 'Andon Hijau Mati', name: "Andon Hijau Mati"},
                {series: 'Andon', value: 'Andon Kuning Mati', name: "Andon Kuning Mati"},
                {series: 'Andon', value: 'PLC Andon Error', name: "PLC Andon Error"},
                {series: 'Andon', value: 'Kabel Serial Andon Error', name: "Kabel Serial Andon Error"},
                
              ],
              optgroups: [
                {value: 'LP', label: 'Logic Panel'},
                {value: 'Sensor', label: 'Sensor LP'},
                {value: 'Andon', label: 'Andon'}
              ],
              optgroupField: 'series',
              labelField: 'name',
              searchField: ['name'],
              placeholder: "Choose Problem",
              delimiter: ","
            });
        var selectize_problem_name = select[0].selectize;

        var select_edit = $("#problem_name_edit").selectize({
              options: [
                {series: 'LP', value: 'LP Layar Hang/ Mati Total', name: "LP Layar Hang/ Mati Total"},
                {series: 'LP', value: 'LP Baterai Habis', name: "LP Baterai Habis"},
                {series: 'LP', value: 'LP Touch Screen Error', name: "LP Touch Screen Error"},
                {series: 'LP', value: 'LP Motherboard Error', name: "LP Motherboard Error"},
                {series: 'LP', value: 'LP Tidak Menyala', name: "LP Tidak Menyala"},
                {series: 'Sensor', value: 'Sensor Lemah', name: "Sensor Lemah"},
                {series: 'Sensor', value: 'Sensor Tidak Sejajar', name: "Sensor Tidak Sejajar"},
                {series: 'Andon', value: 'Andon Tidak Menyala', name: "Andon Tidak Menyala"},
                {series: 'Andon', value: 'Andon Merah Error', name: "Andon Merah Error"},
                {series: 'Andon', value: 'Andon Hijau Error', name: "Andon Hijau Error"},
                {series: 'Andon', value: 'Andon Kuning Error', name: "Andon Kuning Error"},
                {series: 'Andon', value: 'PLC Andon Error', name: "PLC Andon Error"},
                {series: 'Andon', value: 'Kabel Serial Andon Error', name: "Kabel Serial Andon Error"},
              ],
              optgroups: [
                {value: 'LP', label: 'Logic Panel'},
                {value: 'Sensor', label: 'Sensor LP'},
                {value: 'Andon', label: 'Andon'}
              ],
              optgroupField: 'series',
              labelField: 'name',
              searchField: ['name'],
              placeholder: "Choose Problem",
              delimiter: ","
            });
        var selectize_problem_name_edit = select_edit[0].selectize;
        
    /*========================================================================================== */
        


    /*================ Selectize Problem Status & Problem Status Edit =========================*/
        var select_problem_status = $("#problem_status").selectize({
              options: [
                {series: 'DONE', value: '[DONE] Flash LP Program', name: "[DONE] Flash LP Program"},
                {series: 'DONE', value: '[DONE] Pasang Baterai Baru', name: "[DONE] Pasang Baterai Baru"},
                {series: 'DONE', value: '[DONE] Perbaikan Arah Sensor', name: "[DONE] Perbaikan Arah Sensor"},
                {series: 'DONE', value: '[DONE] Kanibal Layar', name: "[DONE] Kanibal Layar"},
                {series: 'DONE', value: '[DONE] Ganti LP Stok', name: "[DONE] Ganti LP Stok"},
                {series: 'DONE', value: '[DONE] Tancapkan Kabel Power', name: "[DONE] Tancapkan Kabel Power"},
                {series: 'DONE', value: '[DONE] Ganti Sensor', name: "[DONE] Ganti Sensor"},
                {series: 'DONE', value: '[DONE] Ganti Lampu Andon', name: "[DONE] Ganti Lampu Andon"},
                {series: 'DONE', value: '[DONE] Ganti Andon', name: "[DONE] Ganti Andon"},
                {series: 'DONE', value: '[DONE] Ganti PLC', name: "[DONE] Ganti PLC"},
                {series: 'DONE', value: '[DONE] Flash PLC Program', name: "[DONE] Flash PLC Program"},
                {series: 'DONE', value: '[DONE] Ganti Kabel Serial PLC', name: "[DONE] Ganti Kabel Serial PLC"},
                {series: 'DONE', value: '[DONE] Lain-lain', name: "[DONE] Lain-lain"},
                {series: 'WAITING', value: '[WAITING] Perbaikan LP', name: "[WAITING] Perbaikan LP"},
                {series: 'WAITING', value: '[WAITING] Perbaikan PLC/ Andon', name: "[WAITING] Perbaikan PLC/ Andon"},
                {series: 'WAITING', value: '[WAITING] Tunggu Material Datang', name: "[WAITING] Tunggu Material Datang"},
                
              ],
              optgroups: [
                {value: 'DONE', label: 'DONE'},
                {value: 'WAITING', label: 'WAITING'}
              ],
              optgroupField: 'series',
              labelField: 'name',
              searchField: ['name'],
              placeholder: "Choose Status",
              delimiter: ","
            });
        var selectize_problem_status = select_problem_status[0].selectize;

        var select_problem_status_edit = $("#problem_status_edit").selectize({
              options: [
                {series: 'DONE', value: '[DONE] Flash LP Program', name: "[DONE] Flash LP Program"},
                {series: 'DONE', value: '[DONE] Pasang Baterai Baru', name: "[DONE] Pasang Baterai Baru"},
                {series: 'DONE', value: '[DONE] Perbaikan Arah Sensor', name: "[DONE] Perbaikan Arah Sensor"},
                {series: 'DONE', value: '[DONE] Kanibal Layar', name: "[DONE] Kanibal Layar"},
                {series: 'DONE', value: '[DONE] Ganti LP Stok', name: "[DONE] Ganti LP Stok"},
                {series: 'DONE', value: '[DONE] Tancapkan Kabel Power', name: "[DONE] Tancapkan Kabel Power"},
                {series: 'DONE', value: '[DONE] Ganti Sensor', name: "[DONE] Ganti Sensor"},
                {series: 'DONE', value: '[DONE] Ganti Lampu Andon', name: "[DONE] Ganti Lampu Andon"},
                {series: 'DONE', value: '[DONE] Ganti Andon', name: "[DONE] Ganti Andon"},
                {series: 'DONE', value: '[DONE] Ganti PLC', name: "[DONE] Ganti PLC"},
                {series: 'DONE', value: '[DONE] Flash PLC Program', name: "[DONE] Flash PLC Program"},
                {series: 'DONE', value: '[DONE] Ganti Kabel Serial PLC', name: "[DONE] Ganti Kabel Serial PLC"},
                {series: 'DONE', value: '[DONE] Lain-lain', name: "[DONE] Lain-lain"},
                {series: 'WAITING', value: '[WAITING] Perbaikan LP', name: "[WAITING] Perbaikan LP"},
                {series: 'WAITING', value: '[WAITING] Perbaikan PLC/ Andon', name: "[WAITING] Perbaikan PLC/ Andon"},
                {series: 'WAITING', value: '[WAITING] Tunggu Material Datang', name: "[WAITING] Tunggu Material Datang"},
              ],
              optgroups: [
                {value: 'DONE', label: 'DONE'},
                {value: 'WAITING', label: 'WAITING'}
              ],
              optgroupField: 'series',
              labelField: 'name',
              searchField: ['name'],
              placeholder: "Choose Status",
              delimiter: ","
            });
        var selectize_problem_status_edit = select_problem_status_edit[0].selectize;
        
    /*================================================================================ */

        //tampil_data();
        //Menampilkan Data di tabel
        function tampil_data(){
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/ambilData',
                type: 'POST',
                dataType: 'json',
                async : false,
                success: function(response){
                    console.log(response);
                    var i;
                    var no = 0;
                    var html = "";
                    for(i=0;i < response.length ; i++){
                        no++;
                        html = html + '<tr>'
                                    + '<td>' + no  + '</td>'
                                    + '<td>' + response[i].incident_name  + '</td>'
                                    + '<td>' + response[i].incident_date  + '</td>'
                                    + '<td>' + response[i].incident_time_begin  + '</td>'
                                    + '<td>' + response[i].incident_time_end  + '</td>'
                                    + '<td>' + response[i].incident_location + '</td>'
                                    + '<td>' + response[i].incident_detail + '</td>'
                                    + '<td>' + response[i].incident_affected + '</td>'
                                    + '<td>' + response[i].incident_remark + '</td>'
                                    + '<td>' + response[i].incident_status + '</td>'
                                    + '<td style="width:16.66%;">' + '<span><a href="#" class="btn btn-primary btn_edit"  data-id="'+ response[i].incident_id +'">Edit</a> <button style="margin-left: 5px;" data-id="'+response[i].incident_id +'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
                                    // + '<td style="width: 16.66%;">' + '<span><button data-toggle="modal" data-target="#editIncidentModal" data-id="'+ no +'" class="btn btn-primary btn_edit">Edit</button> <button style="margin-left: 5px;" data-id="'+response[i].incident_id+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
                                    + '</tr>';
                    }
                    $("#tbl_data").html(html);
                    //$('#Incident_Table').load(window.location.href + " #Incident_Table");
                }
            });
            $('#Incident_Table').DataTable();

        }

      

        /*========================= Memunculkan modal confirm hapus ==============================*/
        $('#tbl_data').on('click','.btn_hapus',function(){
          var problem_id = $(this).attr('data-id');
          $("#confirmHapusModal").modal('show');
          $('#btn_confirm_hapus').on('click',function(){
            //$('#Incident_Table').DataTable().row($(this).parents('tr')).remove().draw();
            $.ajax({
              url: '<?php echo base_url(); ?>C_Index/hapusData',
              type: 'POST',
              data: {problem_id:problem_id},
              success: function(response){
                  $("#confirmHapusModal").modal('hide');
                  notif_hapus_data_berhasil();
                  table.ajax.reload(null, false);
                  //window.location.reload();
                  //$('#Incident_Table').DataTable().ajax.reload();
                  //tampil_data();
                  //data_table.row($(this).parents('tr')).remove().draw();
              }
            })
          })
        });
        /*======================================================================================*/


        /*=========================== Notifikasi Sweet Alert ====================================*/

        function notif_add_data_berhasil(){
          Swal.fire(
            'Tambah Data Berhasil',
            '',
            'success'
            );
        }

        function notif_hapus_data_berhasil(){
          Swal.fire(
            'Hapus Data Berhasil',
            '',
            'success'
          );
        }

        function notif_update_data_berhasil(){
          Swal.fire(
            'Update Data Berhasil',
            '',
            'success'
          );
        }

        /*=======================================================================================*/

        /*============================= Reset field gambar ======================================*/
        function reset_field_gambar(){
          $('#problem_image').val("");
          $('#image-preview').attr("src","https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png");
        }

        function reset_field_gambar_edit(){
          $('#problem_image_edit').val("");
          $('#image-preview-edit').attr("src","https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png");
        }

        //button hapus gambar
        $('#btn_reset_gambar').click(function(){
          reset_field_gambar();
        });

        $('#btn_reset_gambar_edit').click(function(){
          reset_field_gambar_edit();
        });
        /*=====================================================================================*/


        /*======================== Menampilkan Modal Tampil Foto =============================*/
        $('#tbl_data').on('click','.btn_tampil_foto',function(){
          var problem_id = $(this).attr('data-id');
          var img_name;
          $.ajax({
            url : '<?php echo base_url();?>C_Index/ambilDataGambar',
            type : 'POST',
            dataType : 'json',
            data : {problem_id:problem_id},
            success : function(response){
              img_name = response;

              if (img_name == null){
                //alert("Gambar tidak ada");
                $('#tampil_foto').attr("src","https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png");
                $('#lihatFotoModal').modal('show');
              } else {
                $('#tampil_foto').attr("src","<?php echo base_url();?>" + img_name);
                $('#lihatFotoModal').modal('show');
              }
              
              //if (img_name_jpg)
              //img_name = response.incident_picture_name;
               console.log(img_name);
               
              
              // $('#tampil_foto').attr("src","<?php echo base_url();?>" + img_name);
              // $('#lihatFotoModal').modal('show');

            }

          });

        });
        /*====================================================================================*/


        /*============== Tambah Data Baru (Tidak jadi satu dengan gambar) =====================*/
        function addData(){

            var problem_date = $('#problem_date').val();
            var problem_location = $('#problem_location').val();  
            var problem_name = selectize_problem_name.items[0];
            var problem_detail = $('#problem_detail').val();
            var problem_status = selectize_problem_status.items[0];
            var problem_repair_date = $('#problem_repair_date').val();
            var problem_remark = $('#problem_remark').val();
            //var incident_status = $("input[name='incident_status']:checked").val();
            
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/tambahData',
                type: 'POST',
                //async : false,
                //enctype: 'multipart/form-data',
                
                data: {problem_date:problem_date,problem_location:problem_location,problem_name:problem_name,problem_detail:problem_detail,problem_status:problem_status,problem_repair_date:problem_repair_date,problem_remark:problem_remark},
                //data : formData,
                success: function(response){
                    $('#problem_date').val("");
                    $('#problem_location').val("");
                    selectize_problem_name.clear();
                    $('#problem_detail').val("");
                    selectize_problem_status.clear();
                    $('#problem_repair_date').val("");
                    $('#problem_remark').val("");
                    reset_field_gambar();
                    $("#addProblemModal").modal('hide');
                    upload_image();
                    //window.location.reload();
                    //tampil_data_datatable();
                    //tampil_data();
                    table.ajax.reload(null, false);
   
                }
            });
        }
        /*=======================================================================================*/


        

        /*============================== Fungsi Upload Gambar (Terpisah) ========================*/
        //upload image
        function upload_image(){
          var form = document.getElementById('add_data_form');
          var formData = new FormData(form);
          $.ajax({
            url: '<?php echo base_url(); ?>C_Index/doUpload',
            type : "POST",
            data : formData,
            processData:false,
             contentType:false,
             cache:false,
             async:true,
             success: function(data){
              notif_add_data_berhasil();
              //alert("Upload image berhasil");
             }
          });
        }

        $(".btn_alert").click(function(){
          notif_add_data_berhasil();
        });

        //function upload image edit
        function upload_image_edit(){
          var form = document.getElementById('edit_data_form');
          var formData = new FormData(form);
          $.ajax({
            url: '<?php echo base_url();?>C_Index/doUploadEdit',
            type : "POST",
            data : formData,
            processData : false,
            contentType : false,
            cache : false,
            async : true,
            success : function(data){
              notif_update_data_berhasil();

            }

          })
        }

        /*=============================================================================*/


        /*=========================== Fungsi Memunculkan Modal Edit ===================*/
        $("#tbl_data").on('click','.btn_edit',function(){
            var problem_id = $(this).attr('data-id');
            //console.log(incident_id);
            //jQuery.noConflict();
            
            
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/editData',
                type: 'POST',
                data: {problem_id:problem_id},
                dataType: 'json',
                success: function(response){
                    if ((response[0].problem_image_preview) == null){
                      img_name = "uploads/no-image-tut.png";
                    } else {
                      img_name = response[0].problem_image_preview;
                    }
                    
                    console.log(img_name);
                    //console.log(response.incident_picture_name);
                    $("#editProblemModal").modal('show');
                    $('#problem_id_edit').val(response[0].problem_id);
                    $('#problem_date_edit').val(response[0].problem_date);
                    $('#problem_location_edit').val(response[0].problem_location);
                    selectize_problem_name_edit.setValue(response[0].problem_name, false);
                    $('#problem_detail_edit').val(response[0].problem_detail);
                    selectize_problem_status_edit.setValue(response[0].problem_status, false);
                    //tinyMCE.activeEditor.setContent(response[0].incident_detail);
                    $('#problem_repair_date_edit').val(response[0].problem_repair_date);
                    $('#problem_remark_edit').val(response[0].problem_remark);
                    $('#problem_image_name').val(response[0].problem_image_name);
                    $('#image-preview-edit').attr('src',"<?php echo base_url();?>" + img_name);
                    
                }
            })
        });
        /*=======================================================================================*/

        /*============================= Fungsi Untuk Update Data ================================*/
        function updateData(){
            var problem_id = $('#problem_id_edit').val();
            var problem_date = $('#problem_date_edit').val();
            var problem_location = $('#problem_location_edit').val();
            var problem_name = selectize_problem_name_edit.items[0];
            var problem_detail = $('#problem_detail_edit').val();
            var problem_status = selectize_problem_status_edit.items[0];
            var problem_repair_date = $('#problem_repair_date_edit').val();
            var problem_remark = $('#problem_remark_edit').val();
            var problem_image_name = $('#problem_image_name').val();
           
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/updateData',
                type: 'POST',
                data: {problem_id:problem_id,problem_date:problem_date,problem_location:problem_location,problem_name:problem_name,problem_detail:problem_detail, problem_status:problem_status, problem_repair_date:problem_repair_date, problem_remark:problem_remark, problem_image_name:problem_image_name},
                success: function(response){
                    //notif_update_data_berhasil();
                    $('#problem_date_edit').val("");
                    $('#problem_date_edit').val("");
                    $('#incident_time_begin_edit').val("");
                    $('#incident_time_end_edit').val("");
                    selectizeControlEdit.clear();
                    tinyMCE.activeEditor.setContent('');
                    $('#incident_affected_edit').val("");
                    $('#incident_remark_edit').val("");
                    //$('#incident_status_edit').val("");
                    $("#editIncidentModal").modal('hide');
                    table.ajax.reload(null, false);
                }
            })
        }
 
        //Meng-Update Data
        // $("#btn_update_data").on('click',function(e){
        //     e.preventDefault();
        //     $.when(updateData()).done(upload_image_edit());
        //     });
        });
    /*=================================================================================*/
    

      //Hapus Data dengan konfirmasi
        // $("#tbl_data").on('click','.btn_hapus',function(){
        //     var incident_id = $(this).attr('data-id');
        //     //confirm_hapus();
        //     var status = confirm('Yakin ingin menghapus?');
        //     console.log(incident_id);
        //     if(status){
        //         $.ajax({
        //             url: '<?php echo base_url(); ?>C_Index/hapusData',
        //             type: 'POST',
        //             data: {incident_id:incident_id},
        //             success: function(response){
        //                 tampil_data();
        //             }
        //         })
        //     }
        // });

        // function confirm_hapus(){
        //   swal({
        //     title: 'Apa Anda yakin?',
        //     //type: "warning",
        //     showCancelButton : true,
        //     showCancelButton: true,
        //     confirmButtonClass: "btn-danger",
        //     confirmButtonText: "Tentu saja!",
        //     cancelButtonText: "No, cancel plx!",
        //     closeOnConfirm: false,
        //     closeOnCancel: false
        //   }).then((isConfirm) => {
        //     if(isConfirm) {
        //       swal("Sudah dihapus","dadaadas","success");
        //     } else {
        //       swal("Cancelled","dsdsdsds","error");
        //     }
        //   });
        // }

      //Menambahkan Data ke database
        // $("#btn_add_data").on('click',function(e){

        //     e.preventDefault();
        //     // var file_data = $('#incident_picture').prop('files')[0];
        //     // var form = document.getElementById('add_data_form');
        //     // var formData = new FormData(form);

        //     // var incident_name = formData.get("incident_name");
        //     // var incident_date = formData.get("incident_date");
        //     // var incident_time_begin = formData.get("incident_time_begin");
        //     // var incident_time_end = formData.get("incident_time_end");
        //     // var incident_location = selectizeControl.items[0];
        //     // var incident_detail = tinymce.activeEditor.getContent();
        //     // var incident_affected = formData.get("incident_affected");
        //     // var incident_picture = formData.get("incident_picture");
        //     // var incident_remark = formData.get("incident_remark");
        //     // var incident_status = formData.get("incident_status");

        //     var incident_name = $('#incident_name').val();
        //     var incident_date = $('#incident_date').val();
        //     var incident_time_begin = $('#incident_time_begin').val();
        //     var incident_time_end = $('#incident_time_end').val();
        //     var incident_location = selectizeControl.items[0];
        //     var incident_detail = tinymce.activeEditor.getContent();
        //     var incident_affected = $('#incident_affected').val();
        //     //var incident_picture_name = $('')
        //     var incident_remark = $('#incident_remark').val();
        //     var incident_status = $("input[name='incident_status']:checked").val();
        //     console.log(incident_name);
        //     console.log(incident_date);
        //     console.log(incident_time_begin);
        //     console.log(incident_time_end);
        //     console.log(incident_location);
        //     console.log(incident_detail);
        //     console.log(incident_affected);
        //     console.log(incident_remark);
        //     console.log(incident_status);
            
        //     //data_table.row.add(['1',incident_name,incident_date,incident_time_begin,incident_time_end,incident_location,incident_detail,incident_affected,incident_remark,incident_status]).draw(false);
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>C_Index/tambahData',
        //         type: 'POST',

        //         //enctype: 'multipart/form-data',
                
        //         data: {incident_name:incident_name,incident_date:incident_date,incident_time_begin:incident_time_begin,incident_time_end:incident_time_end,incident_location:incident_location,incident_detail:incident_detail, incident_affected:incident_affected, incident_remark:incident_remark, incident_status:incident_status},
        //         //data : formData,
        //         success: function(response){
        //             $('#incident_name').val("");
        //             $('#incident_date').val("");
        //             $('#incident_time_begin').val("");
        //             $('#incident_time_end').val("");
        //             selectizeControl.clear();
        //             tinyMCE.activeEditor.setContent('');
        //             $('#incident_affected').val("");
        //             $('#incident_remark').val("");
        //             $('#incident_status').val("");
        //             $("#addIncidentModal").modal('hide');
        //             //upload_image();
        //             //window.location.reload();
        //             //tampil_data_datatable();
        //             //tampil_data();
        //             table.ajax.reload(null, false);

                    
                    
        //         }
        //     });
            
        // });

        // $("#btn_add_data").on('click',function(e){
        //   e.preventDefault();
        //   upload_image();
        // });
        //Menambahkan gambar ke DB
        // $("#btn_add_data").on('click',function(e){
        //   e.preventDefault();
        //   //var form = $(this).get(0);
        //   var form = document.getElementById('add_data_form');
        //   var formData = new FormData(form);
        //   // formData.append('file',$('input[type=file]')[0].files[0]);
         
        //   $.ajax({
        //     url: '<?php echo base_url(); ?>C_Index/doUpload',
        //     type : "POST",
        //     data : formData,
        //     processData:false,
        //      contentType:false,
        //      cache:false,
        //      async:false,
        //      success: function(data){
        //       alert("Upload image berhasil");
        //      }
        //   });
        // });
</script>




<!-- <form>
                <div class="form-group">
                    <label for="incident_name">Incident</label>
                    <input type="text" name="incident_name" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="incident_date">Date</label>
                    <input type="date" name="incident_date" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>">
                </div>
                <div class="form-group">
                    <label for="incident_time">Time</label>
                    <div class="row">
                    <div class="col-sm-5">
                      <input type="time" class="form-control" name="incident_time_begin" value="00:00">
                    </div>
                    <div class="col">
                      <h4>until</h4>
                    </div>
                    <div class="col-sm-5">        
                      <input type="time" class="form-control" name="incident_time_end" value="23:59">
 
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="incident_location">Location</label>
                    <select id="location" name="incident_location">
                  </select>
                </div>

                <div class="form-group">
                    <label for="incident_detail">Detailed Report</label>
                    <textarea class="form-control" id="incident_detail" name="incident_detail" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="incident_detail">Detailed Report</label>
                    <textarea class="form-control" id="incident_detail" name="incident_detail" rows="5"></textarea>
                </div>
 
            </form> -->




