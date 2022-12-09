<?php 

    function construct(){
        load_model('cart');
    }
    function getCartAction(){
        load_view("cart");
    }

    function changeQtyCartAction(){
        $valueNumber = (int)$_GET['valueNumber'] ;
        $idProduct = (int)$_GET['idProduct'];

        if(getProductRow($idProduct)){
            $item = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            construct_cart($item);
            updateCart($idProduct, $valueNumber);
            start_session_cart();
            echo true;
        }else{
            echo false;
        }
    }


    function deteleCartItemAction(){
        $idProduct = (int)$_GET['idProduct'];
        if(getProductRow($idProduct)){
            $item = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            construct_cart($item);
            removeCart($idProduct);
            start_session_cart();
            echo true;
        }else{
            echo false;
        }
    }

    function deleteCartAction(){
        if(isset($_SESSION["cart"])){
            unset($_SESSION['cart']);
        }
    }

    function getCheckoutSubmitAction(){
        if(getRowAddresses()){
            $id_customer = getIdCustomer();
            $data_address = getDataAddressChechOut();

            $data_order= [
                'id_customer' => $id_customer,
                'username' => $data_address['username'],
                'company' => $data_address['company'],
                'number_phone' => $data_address['number_phone'],
                'province_city' => $data_address['province_city'],
                'district' => $data_address['district'],
                'wards' => $data_address['wards'],
                'note_address' => $data_address['note_address'],
                'type_address' => $data_address['type_address'],
                'total_product' => $_SESSION['cart']['totalQty'],
                'total_price' => $_SESSION['cart']['totalPrice'],
            ];
            $id_order = insertDataOrder($data_order);
            foreach ($_SESSION['cart']['items'] as $key => $item) {
                $price_product = getDataPriceProduct($key);
                $data_order_detail =  [
                    'id_order' => $id_order,
                    'id_product ' => $key,
                    'total_quantity' => $item['qty'],
                    'price' => $price_product['price'],
                    'sale' => $price_product['sale'],
                    'total_price' => $item['price'],
                ];
                insertDataOrderDetail($data_order_detail);
            }
            $_SESSION["orderSucces"] = 'success';

            unset($_SESSION['cart']);
            headerLocation('?contrl=cart&ac=getCart');
        }else{
            $_SESSION["flashCheckOut"] = 'success';
            headerLocation('?contrl=cart&ac=getCart');
        }
    }

?>