<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "starting ItemsTableSeeder\n\n";

        $brownShoes = ['http://media03.toms.com/static/www/images/product/product_image_1450x1015_Hero/BrownLeatherMensSearcherBoots-10002763-1450x1015-H.jpg',
                       'http://static4.shop.indiatimes.com/images/products/additional/original/B2176309_View_5/fashion/casuals/upanah-brown-men-casual-shoes-3032-brown.jpg',
                       'http://shop.kulturpon.com/wp-content/uploads/2015/04/PAUL-PARKMAN-MENS-CHUKKA-BOOTS-BROWN-BORDEAUX7.jpeg'];


        $blackShoes = ['http://static6.shop.indiatimes.com/images/products/additional/original/B2176301_View_5/fashion/formals/upanah-black-men-formal-shoes-3027-black.jpg',
                        'http://www.sortshoes.com/wp-content/uploads/2014/11/steve-madden-evade-black-leather-mens-slip-on-dress-shoes-37204.jpeg',
                        'http://www.vegetarian-shoes.co.uk/Portals/42/product/images/prd%7B587E1867-27D2-4DB6-A66D-C817BF125433%7D.jpg',
                        'http://i01.i.aliimg.com/wsphoto/v0/1068889017/Top-Quality-New-men-s-real-leather-ankle-boots-Formal-dress-shoes-lace-up-Black-Size.jpg'];

        $casualShoes = ['http://069a9d0f32c8741bc0ff-b1e398c78bcda56290a73740994050be.r94.cf2.rackcdn.com/a982e8b8-7c56-45ab-9688-298b424af71e__L.jpg',
                        'http://www.shareishoes.com/images/Adidas/NEO/12-adidas-NEO-CASUAL-MID-Mens-Canvas-SHOE_2.jpg',
                        'http://shoesclothing.co.uk/images/01/Mens-Casual-Shoes-Slip-Ons-Canvas-Loafers-Sneakers-Grey.jpg'];

        $workShirts = ['http://www.qmuniforms.com/photos/styles/SH211_1500_1.jpg',
                        'http://bigtopshirtshop.com/assets/images/all/Devon_And_Jones_D640_Burgundy_Mens_Crown_Collection_Gingham_Check_Long_Sleeve_Button_Down_Shirt.jpg',
                        'http://mensdressshirts.org/wp-content/uploads/2014/09/H2H-Mens-Oxford-Cotton-Slim-Fit-Dress-Button-down-Shirts-Long-Sleeve-WHITE-US-SAsia-M-KMTSTL0219-0.jpg',
                        'http://store.cambriausa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/bluelsshirt_1__1.jpg',
                        'http://g01.a.alicdn.com/kf/HTB1f1SFIpXXXXaTXVXXq6xXFXXX6/Handsome-font-b-men-b-font-shirt-spring-and-summer-font-b-wear-b-font-leisure.jpg',
                        'http://g02.a.alicdn.com/kf/HTB1J2jBIVXXXXauXFXXq6xXFXXXX/French-Cuff-Autumn-Spring-Stand-Collar-font-b-Men-b-font-font-b-Shirt-b-font.jpg'];

        $sweaters = ['http://cdna.lystit.com/photos/2013/08/01/brooks-brothers-kelly-green-country-club-sea-island-vneck-sweater-product-1-11269767-290055020_large_flex.jpeg',
                    'http://wooki.ca/wp-content/uploads/2013/12/3342D30054_7171_01.jpg',
                    'http://www.intheholegolf.com/img/kikkor/kikkor-early-bird-sweater-mens-black-2.JPG',
                    'http://i01.i.aliimg.com/wsphoto/v0/1278924305/4-Color-Vintage-Male-font-b-Crochet-b-font-Sweater-font-b-Cardigan-b-font-2013.jpg'];

        $summerShirts = ['http://www.designerwear.co.uk/images/products/zoom/1345726730-32248000.jpg',
                        'http://g03.a.alicdn.com/kf/HTB1sDKuHVXXXXXcXXXXq6xXFXXXs/men-s-shirts-2015-Summer-Striped-Shirt-Men-Short-Sleeve-Lapel-Plaid-Shirts-Mens-Dress-Casual.jpg',
                        'http://i01.i.aliimg.com/wsphoto/v0/32259296627_1/Mens-Dress-Shirts-2015-New-Summer-Casual-Linen-Shirt-Short-Sleeve-Desigual-Solid-Color-Shirt-Men.jpg',
                        'http://www.truffleshuffle.co.uk/store/images/Mens_Mr_Tall_Mr_Men_T_Shirt_hi_res.jpg'];

        $dressPants = ['http://smtus.imageg.net/SMTNA_25/pimg/pSMTNA-41904822_261_main_t360x450.jpg',
                        'http://www.mensusa.com/images/MensDress-Pants-Navy-Non-Pleated.jpg',
                        'http://i.walmartimages.com/i/p/00/72/09/72/46/0072097246980_500X500.jpg'];

        $jeans = ['http://2.bp.blogspot.com/_q0Au1SbmpNk/TH-E7EEkMVI/AAAAAAAAAIo/1Ye7PXt9qrg/s1600/Men%27s+Jeans+With+Elegant+Look(2).jpg',
                        'http://3.bp.blogspot.com/-EFdDKhhCFoc/TlU7-kS-W1I/AAAAAAAABGM/wKYa9bwdjM8/s1600/Men-Jeans.jpg',
                        'http://www.express.com/cdn/responsive/visualnav/m-denim/m-4-kingston.jpg'];

        $casualPants = ['http://www.flatsevenshop.com/2713-flatseven_cloudzoom_big/mens-slim-fit-flat-front-stretch-chino-casual-pants-trousers-ch503.jpg',
                        'http://i01.i.aliimg.com/wsphoto/v0/1904752981_1/New-2014-Fashion-Multi-Pockets-Cargo-Pants-Men-Casual-Camouflage-100-Cotton-Military-Pants-Color-Khaki.jpg',
                        'http://www.nymsuits.com/assets/images/calvin-klein-mens-flat-front-100-linen-dress-pants-for-destination-weddings-outdoor-events-spring-summer-and-casual-occasions_15453_500.jpg',
                        'http://cdn.joules.com/medias/sys_master/8810429448222.jpg'];

        $shorts = ['http://i.stpost.com/mountain-khakis-original-cargo-shorts-for-men-in-yellowstone~p~4989d_04~1500.3.jpg',
                        'http://i.stpost.com/jachs-dot-print-bermuda-shorts-cotton-for-men-in-navy~p~7839r_01~1500.3.jpg',
                        'http://smtus.imageg.net/SMTNA_25/pimg/pSMTNA-500057211_250_main_t360x450.jpg'];

        $filePath = public_path().'/images';

        foreach ($brownShoes as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);

            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            //save to database
            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "shoe";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }


        foreach ($blackShoes as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "shoe";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($casualShoes as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "shoe";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($workShirts as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "top";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($sweaters as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "top";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($summerShirts as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "top";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($dressPants as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "bottom";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($jeans as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "bottom";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($casualPants as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "bottom";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

        foreach ($shorts as $url) {

            $urlFile = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $fileName = mt_rand(0,99999).'.'.$extension;
            $fileToSave = $filePath.'/'.$fileName;
            $save = file_put_contents($fileToSave, $urlFile);
            $intImg = \Image::make($fileToSave)->fit(400,300)->save();

            $item = new \myCloset\Item();
            $item->src = '/images/'.$fileName;
            $item->type = "bottom";
            $item->user_id = 2;
            $item->save();

            // for ($i = 0; $i < 2; $i++)
            // {
            //     $tag = $tags->random();
            //     $item->tags()->save($tag);
            // }
        }

   }
 }
