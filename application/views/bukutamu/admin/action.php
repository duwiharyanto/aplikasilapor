<script type="text/javascript">
  $(document).ready(function(){
    edit(); 
    validasi();  
    hapus();    
    $('#datatabel').DataTable();
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy",
        todayBtn: true,
    });
    $(".selectdata").select2();             
  })
  function notif(data){
    if(data.success){
      $.notify({
        title: '<strong class="fa fa-check"></strong>',
        message: data.success,
        },{
        type: 'success'
      });         
    }else{
      $.notify({
        title: '<strong class="fa fa-warning"></strong>',
        message: data.error,
        },{
        type: 'danger'
      });         
    }    
  }  
  function loaddata(){
    var url='<?= base_url($global->url."tabel")?>';
    $("#view").load(url);     
  }  
  function add(){
    var url=$("#add").attr('url');   
    $("#view").load(url);      
  }
  function isibukutamu(id){
      var url=$("#add").attr('url');
      $.ajax({
        type:'POST',
        url:url,
        data:{id:id},
        success:function(data){
          $("#view").html(data);       
        }
      })
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
      $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
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
          notif(data);
          loaddata();
          console.log(data.success);
        },
        error:function(){
            $.notify({
              title: '<strong>Perhatian </strong>',
              message: 'Fatal Error, Contact Admin',
              },{
              type: 'danger'
            });  
            console.log(data.upload);        
        }
      })      
    }   
    });    
  } 
  function hapus(){
    $('.hapus').click(function(){
      var url=$(this).attr('url');
      var id=$(this).attr('id');
      swal({
        title:'Mohon Perhatian',
        text:'Hapus Data',
        html:true,
        ConfirmButtonColor:'#d9534F',
        showCancelButton:true,
        type:'warning'
      },function(){
        //window.location.href=url      
        $.ajax({
          url:url,
          type:'POST',
          dataType:'json',
          data:{id:id},
          success:function(data){
            notif(data);
            loaddata();
            console.log(data.success);
          }
        })
      });
      return false
    })     
  }

</script>