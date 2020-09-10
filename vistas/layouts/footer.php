</div>
</div>

   
    <!--FOOTER-->
    <footer id="footer">
    <p>Desarrollado por Sharon Barrios &copy <?=date('Y')?></p>
</footer>
</div>
</div>


<!--RESPONSIVE NAVBAR-->
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$(document).ready(function() {
  $("#hideAside").on("click", function() {
    $('aside').toggle("slide");
  })
})
</script>

</body>
</html>
<?php
ob_end_flush();
?>