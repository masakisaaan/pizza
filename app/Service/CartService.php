<?php

    namespace App\Service;
    use Illuminate\Support\Facades\DB;
    use App\Product;

    /**
     *  カートの処理
     */

     class CartService {


         // カートの中身を返す
         public function showCart() {

             //セッションデータを取得、nullの場合は空の配列
             $products = session()->get("products",[]);
             $productMap = session()->get("productMap",[]);
             $productCount = [];
             $total = 0;

            foreach ($products as $product) {


                if(isset($productCount[$product->id])){

                    $productCount[$product->id] += 1;

                }else{

                    $productCount[$product->id] = 1;

                }

                // 合計金額の処理
                $total += $product->productPrice->product_price;
            }


            return [$products,$productCount,$productMap,$total];

         }


         // 商品追加処理
         public function addProduct($id,$sum) {

             // セッションデータを取得、nullの場合は空の配列
             $products = session()->get("products",[]);
             $productMap = session()->get("productMap",[]);


             // 引数idの商品を取得
             $product = Product::with('productPrice')->find($id);

             // 数量分追加する
             for ($i=0; $i < $sum ; $i++) {
                 $products[] = $product;
             }

             $productMap[$product->id] = $product;

             // セッションに格納する
             session()->put("products", $products);
             session()->put("productMap", $productMap);
         }


         // カートの中身を空にする
         static public function clear() {
             session()->flush();
         }

         /**
          * @return int
          */
         static public function countCartContents() {

             $productMap = session()->get("productMap",[]);
             $count = count($productMap);

            return compact('count');
         }

     }
