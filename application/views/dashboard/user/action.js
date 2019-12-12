<script type="text/javascript">
  $(document).ready(function(){
    edit(); 
    $('.hapus').click(function(){
      var url=$(this).attr('url');
      swal({
        title:'Perhatian',
        text:'Hapus Data',
        html:true,
        ConfirmButtonColor:'#d9534F',
        showCancelButton:true,
        type:'warning'
      },function(){
        window.location.href=url
      });
      return false
    })       
    $('#datatabel').DataTable();
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy",
        todayBtn: true,
    });
    $(".selectdata").select2();             
  })
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
</script>