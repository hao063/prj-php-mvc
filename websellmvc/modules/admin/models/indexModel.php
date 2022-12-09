<?php

   function getDataInfoManager(){
      $data = [];

      $date = date('Y-m-d');
      $sql_order = "SELECT * FROM orders WHERE time_order = '$date' AND status = '3'";
      $data_price_order = db_fetch_array($sql_order);
      $row_order = 0;
      foreach($data_price_order as $row) {
         $row_order += $row['total_price'];
      }
      $data['totalOrder'] = $row_order;

      $sql_account = "SELECT * FROM customers WHERE token_login = 'true'";
      $row_account = db_num_row($sql_account);
      $data['totalAccount'] = $row_account; 
      
      $sql_order_new = "SELECT * FROM orders WHERE status = '0'";
      $row_order_new = db_num_row($sql_order_new);
      $data['totalOrdernew'] = $row_order_new;

      $sql_transported = "SELECT * FROM orders WHERE status = '1'";
      $row_transported = db_num_row($sql_transported);
      $data['totalTransported'] = $row_transported;

      return $data;
   }
?>