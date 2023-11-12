<?php
  for($num=1; $num<=$totalPages; $num++) {
    echo '<a class="page-item" href="?per_page='.$item_per_page.'&page='.$num.'">'.$num.'</a>';
  }
?>