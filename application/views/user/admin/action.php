<script type="text/javascript">
  $(document).ready(function(){
    edit(); 
    //toast();
    validasi();  
    hapus();    
    // $('#datatabel').DataTable();
    // $('.datepicker').datepicker({
    //     autoclose: true,
    //     todayHighlight: true,
    //     format: "dd-mm-yyyy",
    //     todayBtn: true,
    // });
    // $(".selectdata").select2(); 
    $('#datatabel2').DataTable( {
      dom: 'Bfrtip',
      pageLength:100,
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            }, 
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },                      
        'colvis'
        ],
      order: [[ 0, "desc" ]]    
    } );                  
  })
  // function toast(position) {
  //   'use strict';
  //   resetToastPosition();
  //   $.toast({
  //     heading: 'Positioning',
  //     text: 'Specify the custom position object or use one of the predefined ones',
  //     position: String(position),
  //     icon: 'info',
  //     stack: false,
  //     loaderBg: '#f96868'
  //   })
  // }  
  // function resetToastPosition() {
  //   $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
  //   $(".jq-toast-wrap").css({
  //     "top": "",
  //     "left": "",
  //     "bottom": "",
  //     "right": ""
  //   }); //to remove previous position style
  // }  
  function add(){
    var url=$("#add").attr('url');   
    $("#view").load(url);      
  }
  function edit(){   
    $('.edit').click(function(){
      var url=$(this).attr('url');
      var id=$(this).attr('id');
      //alert(id);
      $.ajax({
        type:'POST',
        url:url,
        data:{id:id},
        success:function(data){
          $("#view").html(data);       
        }
      })
      return false;        
    })
  }
  /**/
  function validasi(){
    $("form").validate({
    errorPlacement: function ( error, element ) {
      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.parent( "label" ) );
      } else {
        error.insertAfter( element );
      }
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );
      $('.error').css('font-weight', 'normal');
    },    
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".form-group" ).addClass( "text-danger" ).removeClass( "text-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).parents( ".form-group" ).addClass( "text-success" ).removeClass( "text-error" );
    },
    submitHandler:function(form){
      var url=$('form').attr('url');  
      $.ajax({
        url:url,
        type:'POST',
        dataType:'json',
        data:$('form').serialize(),
        data:new FormData($('form')[0]),
        processData:false,
        contentType:false,
        encode:true,
        cache:false,
        secureuri:false,
        cache:false,
        mimeType:'multipart/form-data',
        success:function(data){
          if(data.success){
            toastberhasil();      
          }else{
            toastgagal();              
          }
          loaddata();
          console.log(data.success);
        },
        error:function(){
            toastgagal(); 
            console.log(data.upload);        
        }
      }) 
   
    }   
    });    
  } 
  
  function loaddata(){
    var url='<?= base_url($global->url."tabel")?>';
    $("#view").load(url);     
  }

  function hapus(){
    $('.hapus').click(function(){
      var url=$(this).attr('url');
      var id=$(this).attr('id');
      // swal({
      //   title: 'Anda Yakin ?',
      //   text: "Data akan dihapus permanen",
      //   icon: 'warning',
      //   showCancelButton: true,
      //   confirmButtonColor: '#3f51b5',
      //   cancelButtonColor: '#ff4081',
      //   confirmButtonText: 'Great ',
      //   buttons: {
      //     cancel: {
      //       text: "Cancel",
      //       value: null,
      //       visible: true,
      //       className: "btn btn-danger",
      //       closeModal: true,
      //     },
      //     confirm: {
      //       text: "OK",
      //       value: true,
      //       visible: true,
      //       className: "btn btn-primary",
      //       closeModal: true
      //     }
      //   }
      // }).then(
      //   function(){
      //     //window.location.href=url      
      //     $.ajax({
      //       url:url,
      //       type:'POST',
      //       dataType:'json',
      //       data:{id:id},
      //       success:function(data){
      //         if(data.success){
      //           toastberhasil();           
      //         }else{
      //           toastgagal();       
      //         }
      //         loaddata();
      //         console.log(data.success);
      //       },
      //     error:function(){
      //         toastgagal();       
      //         console.log(data.upload);        
      //     }          
      //     })
      //   }
      // );
    swal({
      title: "Anda yakin ?",
      text: "data akan dihapus permanen",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url:url,
            type:'POST',
            dataType:'json',
            data:{id:id},
            success:function(data){
              if(data.success){
                toastberhasil();           
              }else{
                toastgagal();       
              }
              loaddata();
              console.log(data.success);
            },
          error:function(){
              toastgagal();       
              console.log(data.upload);        
          }          
          })
      } else {
        swal("Proses dibatalkan", "", "error");
      }
    });      
      return false
    })     
  }
</script>