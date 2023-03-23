CREATE TABLE IF NOT EXISTS `ip_<?php echo $title; ?>` 
( `<?php echo ($title)."_"?>id` INT(11) NOT NULL AUTO_INCREMENT,
<?php foreach($items as $item){ 
echo "`".$item."` "."VARCHAR(255),";
} ?>
PRIMARY KEY (`<?php echo ($title)."_"?>id`) );
