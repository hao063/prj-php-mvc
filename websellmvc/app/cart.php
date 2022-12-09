<?php 
$items = null;
$totalPrice = 0;
$totalQty = 0;

function construct_cart($oldCart){
    global $items, $totalPrice, $totalQty;
    if($oldCart){
        $items = $oldCart['items'];
        $totalPrice = $oldCart['totalPrice'];
        $totalQty = $oldCart['totalQty'];
    }
}


function addCart($id, $qty = 1){
    global $items, $totalPrice, $totalQty;
    $sql = "SELECT * FROM products WHERE id = $id";
    $item = db_fetch_row($sql);
    $price = $item['sale'] > 0 ? $item['price'] - $item['sale'] : $item['price'];
    $sql_img = "SELECT * FROM images_product WHERE id_product = $id";
    $data_img = db_fetch_row($sql_img);
    $image = $data_img['name_img'].'.'.$data_img['type_img'];
    $cart = ['qty' => 0, 'price' => $price, 'image' => $image, 'item' => $item];
    if($items){
        if(array_key_exists($id,$items)){
            $cart = $items[$id];
        }
    }
    $cart['qty'] += $qty;
    $cart['price'] = $price * $cart['qty'];
    $items[$id] = $cart;
    $totalQty+= $qty;
    $totalPrice += $price * $qty;
}

function removeCart($id){
    global $items, $totalPrice, $totalQty;
    $totalQty -= $items[$id]['qty'];
    $totalPrice -= $items[$id]['price'];
    unset($items[$id]);
}

function updateCart($id, $qty){
    global $items, $totalPrice, $totalQty;
    if(array_key_exists($id,$items)){
        $totalQty -= $items[$id]['qty'];
        $totalPrice -= $items[$id]['price'];
        $items[$id]['qty'] = $qty;
        $items[$id]['price'] =  ($items[$id]['item']['price'] -  $items[$id]['item']['sale']) * $qty;
        $totalQty += $items[$id]['qty'];
        $totalPrice += $items[$id]['price'];
    }
}


function start_session_cart(){
    global $items, $totalPrice, $totalQty;
    $arrayCart =  [
        'items' => $items,
        'totalPrice' => $totalPrice,
        'totalQty' => $totalQty,
    ];
    $_SESSION['cart'] = $arrayCart;
    return true;
}


?>