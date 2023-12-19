<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#seachControl").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#records tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $(".preventEventCreate").prop("disabled", true);
  $("select").change(function(){
     var invalidvalue = $(this).val();
        if(invalidvalue==="invalid"){
        $(".preventEventCreate").prop("disabled", true);
      }else{
        $(".preventEventCreate").prop("disabled", false);
      }
  });

  var val = $(".seeMoreBox").val();
  let splt = val.split(" ");
  if(splt.length === 1){
    $(".seeMoreBox").css("word-break", "break-all");
    }else{
      $(".seeMoreBox").css("word-break", "keep-all");
    }



    
});
</script>