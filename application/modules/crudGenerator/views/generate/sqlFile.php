CREATE TABLE IF NOT EXISTS `<?php echo $VARIABLEmodel_TableName; ?>` 
( `id` INT(11) NOT NULL AUTO_INCREMENT,
<?php foreach($items as $item){ 
echo "`".$item."` "."VARCHAR(255),";
} ?>
PRIMARY KEY (`id`) );
