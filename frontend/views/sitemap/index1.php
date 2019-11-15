
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

<?php


use yii\db\Query;
$query =  "SELECT id from addproperty where is_active='1' and status='approved'";

$getproperties  =  Yii::$app->db->createCommand($query)->queryAll(); 


echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl').'</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/buyer</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/seller</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lessee</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lessor</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/contact-us</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/user/sign-in/login</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/user/sign-in/request-password-reset</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/user/sign-in/signup</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/site/userdash</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/buyeraction/search</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/sellor-expectations/buyer</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lesseeaction/index1</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/request-sitevisit</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>https://live.15bells.com</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/documentshow</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/banknew/create</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lesseeaction/search</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lessor-expectations/lessee</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lesseeaction/index</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/creates</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/sellorview</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/sellor</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/sellor-expectations/sellor</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/create</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/lesview</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/lessor</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/lessor-expectations/lessor</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/site/couserdash</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/site/postlogin</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;

echo '<url>'.PHP_EOL;
echo '<loc>'.Yii::getAlias('@frontendUrl') . '/common/documents</loc>'.PHP_EOL;
echo '<changefreq>daily</changefreq>'.PHP_EOL;
echo '</url>'.PHP_EOL;




foreach($getproperties as $getproperti)

  {
        $id = $getproperti['id'];
        echo '<url>'.PHP_EOL;
        echo '<loc>'.Yii::getAlias('@frontendUrl') . '/addproperty/sitemapview?id='.$id.'</loc>'.PHP_EOL;
        echo '<changefreq>daily</changefreq>'.PHP_EOL;
        echo '</url>'.PHP_EOL;
  }



?>
</urlset>
