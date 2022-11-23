<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incident List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/css/selectize.bootstrap4.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.css');?>"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" style="stylesheet"/>


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.4.1/sifter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js"></script>
    <script src="<?=base_url('assets');?>/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/js/selectize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

</head>
<body style="margin: 20px;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <b class="col-md-9">Incident List</b>
            
              <button data-toggle="modal" data-target="#addIncidentModal" class="btn btn-success">Tambah Data</button>
              <a class="btn btn-warning" href="<?php echo base_url().'C_Index/export_to_excel';?>">Export to Excel</a>
      
            
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="Incident_Table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Incident Name</th>
                            <th>Date</th>
                            <th>Time Begin</th>
                            <th>Time End</th>
                            <th>Location</th>
                            <th>Detail</th>
                            <th>Affected User</th>
                            <th>Remark</th>
                            <th>Status</th>
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
    <div id="addIncidentModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Insert New Incident</h4>

          </div>
          <div class="modal-body">
            
				<div class="row">
				  <div class="col-md-12">
				    
				    <div class="card">
				      <div class="card-body">
				          <form class="forms-sample" id="add_data_form" method="POST" enctype="multipart/form-data">
				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                  <label><h4>Incident</h4></label>
				                  <input type="text" class="form-control" id="incident_name" name="incident_name" placeholder="Ex: Listrik mati">
				                </div>
				                <div class="form-group">
				                  <label><h4>Date</h4></label>
				                 <input type="date" id="incident_date" name="incident_date" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>">

				                  <!-- <vuejs-datepicker input-class="form-control" type="text" placeholder="dd mm yyyy" name="incident_date" typeable value="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>"></vuejs-datepicker> -->
				                </div>
				                <div class="form-group">
				                  <!-- <vue-timepicker name="incident_time">ddada</vue-timepicker> -->
				                  <label><h4>Time</h4></label>
				                  <div class="row">
				                    <div class="col-sm-4">
				                      <input type="time" class="form-control" id="incident_time_begin" name="incident_time_begin" value="00:00">
				                    </div>
				                    <div class="col-sm-4 center">
				                      <h4>until</h4>
				                    </div>
				                    <div class="col-sm-4">        
				                      <input type="time" class="form-control" id="incident_time_end" name="incident_time_end" value="23:59">
				 
				                    </div>
				                  </div>
				                  
				                </div>
				                <div class="form-group">
				                  <label><h4>Location</h4></label>
				                  <select id="location" id="incident_location" name="incident_location">
				                  </select>
				                </div>
				 
				                <div class="form-group">
				                  <label><h4>Detailed Report</h4></label>
				                  <textarea class="form-control" id="incident_detail" name="incident_detail" rows="5"></textarea>
				                  <!-- <input type="" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password"> -->
				                </div>
				              </div>
				                

				              <div class="col-md-6">
				                
				                <div class="form-group">
				                  <label><h4>Affected User</h4></label>
				                  <input type="text" class="form-control" id="incident_affected" name="incident_affected" placeholder="Ex: SEA/ Cell A01">
				                </div>

				                <div class="form-group">
				                  <label><h4>Picture</h4></label>
				                  <input type="file" ref="file"class="form-control file-upload-info" accept="image/*" onchange="updatePreview(this, 'image-preview')" id="incident_picture" name="incident_picture">
				                  <button type="button" class="btn btn-link" id="btn_reset_gambar">X Delete Picture</button>
                          <!-- <span class="input-group-append">
				                    <button class="file-upload-browse btn btn-primary" type="button">Choose File</button>
				                  </span> -->
				                </div>
				                <div class="form-group">
				                  <img id="image-preview" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png" class="" width="200" height="150"/>
				                  
                        </div>
				                <div class="form-group">
				                  <label><h4>Remark</h4></label>
				                  <textarea class="form-control" id="incident_remark" name="incident_remark" rows="3"></textarea>
				                </div>
				              
				                <div class="form-group">
				                  <label><h4>Status</h4></label>
				                  <div class="form-check form-check-warning">
				                    <label class="form-check-label">
				                      <input type="radio" class="form-check-input" name="incident_status" class="incident_status" value="on_going" checked>
				                      On-Going
				                    </label>
				                  </div>
				                  <div class="form-check form-check-success">
				                    <label class="form-check-label">
				                      <input type="radio" class="form-check-input" name="incident_status" class="incident_status" value="done">
				                      Done
				                    </label>
				                  </div>
				                  <div class="form-check form-check-danger">
				                    <label class="form-check-label">
				                      <input type="radio" class="form-check-input" name="incident_status" class="incident_status" value="pending">
				                      Pending/ Need Follow Up
				                    </label>
				                  </div>
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
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>


 
    <!-- Modal Edit-->
    <div id="editIncidentModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Edit Data</h4>
          </div>
          <div class="modal-body">
            
                <div class="row">
                  <div class="col-md-12">
                    
                    <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" id="app" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label><h4>Incident</h4></label>
                                  <input type="hidden" id="incident_id_edit" name="incident_id_edit">
                                  <input type="text" class="form-control" id="incident_name_edit" name="incident_name_edit" placeholder="Ex: Listrik mati">
                                </div>
                                <div class="form-group">
                                  <label><h4>Date</h4></label>
                                 <input type="date" id="incident_date_edit" class="form-control" placeholder="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>">

                                  <!-- <vuejs-datepicker input-class="form-control" type="text" placeholder="dd mm yyyy" name="incident_date" typeable value="<?php date_default_timezone_set("Asia/Jakarta");echo date("m d Y");?>"></vuejs-datepicker> -->
                                </div>
                                <div class="form-group">
                                  <!-- <vue-timepicker name="incident_time">ddada</vue-timepicker> -->
                                  <label><h4>Time</h4></label>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <input type="time" class="form-control" id="incident_time_begin_edit" value="00:00">
                                    </div>
                                    <div class="col-sm-4 center">
                                      <h4>until</h4>
                                    </div>
                                    <div class="col-sm-4">        
                                      <input type="time" class="form-control" id="incident_time_end_edit" value="23:59">
                 
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="form-group">
                                  <label><h4>Location</h4></label>
                                  <select id="location_edit">
                                  </select>
                                </div>
                 
                                <div class="form-group">
                                  <label><h4>Detailed Report</h4></label>
                                  <textarea class="form-control" id="incident_detail_edit" name="incident_detail_edit" rows="5"></textarea>
                                  <!-- <input type="" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password"> -->
                                </div>
                              </div>
                                

                              <div class="col-md-6">
                                
                                <div class="form-group">
                                  <label><h4>Affected User</h4></label>
                                  <input type="text" class="form-control" id="incident_affected_edit" placeholder="Ex: SEA/ Cell A01">
                                </div>
                                <div class="form-group">
                                  <label><h4>Picture</h4></label>
                                  <input type="file" class="form-control file-upload-info" accept="image/*" onchange="updatePreview(this, 'image-preview')" id="incident_picture_edit">
                                  <button class="btn btn-danger">X</button>
                                  <!-- <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Choose File</button>
                                  </span> -->
                                </div>
                                <div class="form-group">
                                  <img id="image-preview" src="https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png" class="" width="200" height="150"/>
                                </div>
                                <div class="form-group">
                                  <label><h4>Remark</h4></label>
                                  <textarea class="form-control" id="incident_remark_edit" rows="3"></textarea>
                                </div>
                              
                                <div class="form-group">
                                  <label><h4>Status</h4></label>
                                  <div class="form-check form-check-warning">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="incident_status_edit" class="incident_status" value="on_going" checked>
                                      On-Going
                                    </label>
                                  </div>
                                  <div class="form-check form-check-success">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="incident_status_edit" class="incident_status" value="done">
                                      Done
                                    </label>
                                  </div>
                                  <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="incident_status_edit" class="incident_status" value="pending">
                                      Pending/ Need Follow Up
                                    </label>
                                  </div>
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
           <button type="button" class="btn btn-success" id="btn_update_data">Update</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>

    <!-- Modal Hapus Data -->
    <div id="confirmHapusModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">X</button>
            <h4 class="modal-title">Hapus Data</h4>
          </div>
          <div class="modal-body">
            <h4>Yakin ingin hapus data?</h4>
          </div>

          <div class="modal-footer">
           <button type="button" class="btn btn-danger" id="btn_confirm_hapus">Hapus</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>      
        </div>
      </div>
      
    </div>
 
</html>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> -->
<!-- <script src="<?= base_url('assets')?>/js/dataTables.bootstrap4.js"></script> -->

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
        table = $('#Incident_Table').DataTable({
          pagingType: 'full_numbers',
          processing: true,
          serverSide: true,
          order : [],
          filter: true,
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

        //selectize
        var select = $("#location").selectize({
              options: [
                {series: 'main_office', value: 'IT', name: "IT"},
                {series: 'main_office', value: 'Development', name: "Development"},
                {series: 'main_office', value: 'Marketing', name: "Marketing"},
                {series: 'main_office', value: 'Accounting', name: "Accounting"},
                {series: 'main_office', value: 'HRD/ GA', name: "HRD/ GA"},
                {series: 'produksi', value: 'Gedung A', name: "Gedung A"},
                {series: 'produksi', value: 'Gedung B', name: "Gedung B"}
              ],
              optgroups: [
                {value: 'main_office', label: 'Main Office'},
                {value: 'produksi', label: 'Produksi'}
              ],
              optgroupField: 'series',
              labelField: 'name',
              searchField: ['name'],
              placeholder: "Choose Location",
              delimiter: ","
            });
        var selectizeControl = select[0].selectize;

        var select_edit = $("#location_edit").selectize({
              options: [
                {series: 'main_office', value: 'IT', name: "IT"},
                {series: 'main_office', value: 'Development', name: "Development"},
                {series: 'main_office', value: 'Marketing', name: "Marketing"},
                {series: 'main_office', value: 'Accounting', name: "Accounting"},
                {series: 'main_office', value: 'HRD/ GA', name: "HRD/ GA"},
                {series: 'produksi', value: 'Gedung A', name: "Gedung A"},
                {series: 'produksi', value: 'Gedung B', name: "Gedung B"}
              ],
              optgroups: [
                {value: 'main_office', label: 'Main Office'},
                {value: 'produksi', label: 'Produksi'}
              ],
              optgroupField: 'series',
              labelField: 'name',
              searchField: ['name'],
              placeholder: "Choose Location",
              delimiter: ","
            });
        var selectizeControlEdit = select_edit[0].selectize;
        
        
        

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

      

        //Memunculkan modal confirm hapus
        $('#tbl_data').on('click','.btn_hapus',function(){
          var incident_id = $(this).attr('data-id');
          $("#confirmHapusModal").modal('show');
          $('#btn_confirm_hapus').on('click',function(){
            //$('#Incident_Table').DataTable().row($(this).parents('tr')).remove().draw();
            $.ajax({
              url: '<?php echo base_url(); ?>C_Index/hapusData',
              type: 'POST',
              data: {incident_id:incident_id},
              success: function(response){
                  $("#confirmHapusModal").modal('hide');
                  table.ajax.reload(null, false);
                  //window.location.reload();
                  //$('#Incident_Table').DataTable().ajax.reload();
                  //tampil_data();
                  //data_table.row($(this).parents('tr')).remove().draw();
              }
            })
          })
        });

        //Reset field gambar
        function reset_field_gambar(){
          $('#incident_picture').val("");
          $('#image-preview').attr("src","https://www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png");
        }

        //button hapus gambar
        $('#btn_reset_gambar').click(function(){
          reset_field_gambar();
        });

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

        function confirm_hapus(){
          swal({
            title: 'Apa Anda yakin?',
            //type: "warning",
            showCancelButton : true,
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Tentu saja!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          }).then((isConfirm) => {
            if(isConfirm) {
              swal("Sudah dihapus","dadaadas","success");
            } else {
              swal("Cancelled","dsdsdsds","error");
            }
          });
        }

        function addData(){

           var incident_name = $('#incident_name').val();
            var incident_date = $('#incident_date').val();
            var incident_time_begin = $('#incident_time_begin').val();
            var incident_time_end = $('#incident_time_end').val();
            var incident_location = selectizeControl.items[0];
            var incident_detail = tinymce.activeEditor.getContent();
            var incident_affected = $('#incident_affected').val();
            //var incident_picture_name = $('')
            var incident_remark = $('#incident_remark').val();
            var incident_status = $("input[name='incident_status']:checked").val();
            
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/tambahData',
                type: 'POST',

                //enctype: 'multipart/form-data',
                
                data: {incident_name:incident_name,incident_date:incident_date,incident_time_begin:incident_time_begin,incident_time_end:incident_time_end,incident_location:incident_location,incident_detail:incident_detail, incident_affected:incident_affected, incident_remark:incident_remark, incident_status:incident_status},
                //data : formData,
                success: function(response){
                    $('#incident_name').val("");
                    $('#incident_date').val("");
                    $('#incident_time_begin').val("");
                    $('#incident_time_end').val("");
                    selectizeControl.clear();
                    tinyMCE.activeEditor.setContent('');
                    $('#incident_affected').val("");
                    reset_field_gambar();
                    $('#incident_remark').val("");
                    $('#incident_status').val("");
                    $("#addIncidentModal").modal('hide');
                    //upload_image();
                    //window.location.reload();
                    //tampil_data_datatable();
                    //tampil_data();
                    table.ajax.reload(null, false);
   
                }
            });

        }

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
              alert("Upload image berhasil");
             }
          });
        }

        $("#btn_add_data").on('click',function(e){
          e.preventDefault();
          $.when(addData()).done(upload_image());
        });

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


        


        //Memunculkan modal edit
        $("#tbl_data").on('click','.btn_edit',function(){
            var incident_id = $(this).attr('data-id');
            console.log(incident_id);
            //jQuery.noConflict();
            
            //var incident_id = 
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/editData',
                type: 'POST',
                data: {incident_id:incident_id},
                dataType: 'json',
                success: function(response){
                    console.log('ok');
                    console.log(response[0].incident_name);
                    $("#editIncidentModal").modal('show');
                    $('#incident_id_edit').val(response[0].incident_id);
                    $('#incident_name_edit').val(response[0].incident_name);
                    $('#incident_date_edit').val(response[0].incident_date);
                    $('#incident_time_begin_edit').val(response[0].incident_time_begin);
                    $('#incident_time_end_edit').val(response[0].incident_time_end);
                    selectizeControlEdit.setValue(response[0].incident_location, false);
                    tinyMCE.activeEditor.setContent(response[0].incident_detail);
                    $('#incident_affected_edit').val(response[0].incident_affected);
                    $('#incident_remark_edit').val(response[0].incident_remark);
                    $("input[name='incident_status_edit']:checked").val(response[0].incident_status);
                }
            })
        });
 
        //Meng-Update Data
        $("#btn_update_data").on('click',function(){
            // var noinduk = $('input[name="noinduk_edit"]').val();
            // var nama = $('input[name="nama_edit"]').val();
            // var alamat = $('input[name="alamat_edit"]').val();
            // var hobi = $('input[name="hobi_edit"]').val();
            var incident_id = $('#incident_id_edit').val();
            var incident_name = $('#incident_name_edit').val();
            var incident_date = $('#incident_date_edit').val();
            var incident_time_begin = $('#incident_time_begin_edit').val();
            var incident_time_end = $('#incident_time_end_edit').val();
            var incident_location = selectizeControlEdit.items[0];
            var incident_detail = tinymce.activeEditor.getContent();
            var incident_affected = $('#incident_affected_edit').val();
            //var incident_picture_name = $('')
            var incident_remark = $('#incident_remark_edit').val();
            var incident_status = $("input[name='incident_status_edit']:checked").val();
            $.ajax({
                url: '<?php echo base_url(); ?>C_Index/updateData',
                type: 'POST',
                data: {incident_id:incident_id,incident_name:incident_name,incident_date:incident_date,incident_time_begin:incident_time_begin,incident_time_end:incident_time_end,incident_location:incident_location,incident_detail:incident_detail, incident_affected:incident_affected, incident_remark:incident_remark, incident_status:incident_status},
                success: function(response){
                    $('#incident_name_edit').val("");
                    $('#incident_date_edit').val("");
                    $('#incident_time_begin_edit').val("");
                    $('#incident_time_end_edit').val("");
                    selectizeControlEdit.clear();
                    tinyMCE.activeEditor.setContent('');
                    $('#incident_affected_edit').val("");
                    $('#incident_remark_edit').val("");
                    $('#incident_status_edit').val("");
                    $("#editIncidentModal").modal('hide');
                    tampil_data();
                }
            })
 
        });
    });
    
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




