
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

<?php


use yii\db\Query;
$query =  "SELECT a.*,t.typename from addproperty as a join property_type as t on a.project_type_id = t.id where a.is_active='1' and a.status='approved'";

$getproperties  =  Yii::$app->db->createCommand($query)->queryAll(); 

$query1 =  "SELECT slug from article  where status='1'";

$getblogs  =  Yii::$app->db->createCommand($query1)->queryAll(); 


echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl').'</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/buyer</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/buyeraction/viewpropertys</loc>'.PHP_EOL;
echo '<changefreq>weekly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/seller</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lessee</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lesseeaction/viewpropertys</loc>'.PHP_EOL;
echo '<changefreq>weekly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lessor</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/contact-us</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/user/sign-in/signup?ifs=menu1</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/user/sign-in/request-password-reset</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/user/sign-in/signup</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/site/userdash</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;


echo '<url>'.PHP_EOL;
echo '<loc>https://live.15bells.com</loc>'.PHP_EOL;
echo '<changefreq>monthly</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;


echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/blogs</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;



// echo '<pre>';print_r($getblogs);die;
foreach ($getblogs as $getblog){


  echo '<url>'.PHP_EOL;
   echo '<loc>'.Yii::getAlias('@frontendUrl') . '/blogs/'.$getblog['slug'].'</loc>'.PHP_EOL;
   echo '<changefreq>daily</changefreq>'.PHP_EOL;
   echo '</url>'.PHP_EOL;

}

foreach($getproperties as $getproperti)

  {
        $id = $getproperti['id'];
        $typename = strtolower($getproperti['typename']);
        $typename  =  preg_replace("/[\s_]/", "-", $typename);

        
        $town_name = strtolower($getproperti['town_name']);
        
        $town_names = preg_replace("/[\s_]/", "-", $town_name);

        $locality = $getproperti['locality'];
         $arr = explode(",", $locality, 3);
        // echo '<pre>';print_r($arr);die;
        $first = $arr[0].$arr[1];
        
        $second = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $first);
        $string = strtolower($second);
        $string = preg_replace("/[\s_]/", "-", $string);
        echo '<url>'.PHP_EOL;
       // echo '<loc>'.Yii::getAlias('@frontendUrl') . '/'.$second.'?id='.$id.'</loc>'.PHP_EOL;

        echo '<loc>'.Yii::getAlias('@frontendUrl') . '/'.$town_names.'/'.$typename.'/'.$string.'/'.$id.'</loc>'.PHP_EOL;
        echo '<changefreq>daily</changefreq>'.PHP_EOL;
        echo '</url>'.PHP_EOL;
  }



?>
</urlset>
