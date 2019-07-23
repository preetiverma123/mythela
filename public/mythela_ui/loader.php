<div id="load"></div>
<style>
#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:99999;
    background:url("img/loader.gif") no-repeat center center rgba(255,255,255,0.82)
}
</style>
<script>
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
      setTimeout(function(){
          document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
      },1000);
  }
}
</script>