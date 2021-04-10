<?php
$pdo = new PDO('mysql:host=localhost;dbname=lessom_marlin', "im", "123123");
$create_table = "CREATE TABLE `lessom_marlin`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , 
`status` VARCHAR(255) NOT NULL , `img` VARCHAR(255) NOT NULL , `alt` VARCHAR(255) NOT NULL , 
`title_name` VARCHAR(255) NOT NULL , `title_role` VARCHAR(255) NOT NULL , `link_tw` VARCHAR(255) NOT NULL , 
`link_wrap` VARCHAR(255) NOT NULL , `contact` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB 
    CHARSET=utf8 COLLATE utf8_general_ci;";

$create_sanny= "INSERT INTO `users` (`id`, `status`, `img`, `alt`, `title_name`, `title_role`, `link_tw`, `link_wrap`, 
                     `contact`) VALUES (NULL, 'nobanned', 'img/demo/authors/sunny.png', 'Sunny A.', 'Sunny A. (UI/UX Expert)', 
                                        'Lead Author','@myplaneticket', 'https://wrapbootstrap.com/user/myorange', 'Contact Sunny')";

$create_jos = "INSERT INTO `users` (`id`, `status`, `img`, `alt`, `title_name`, `title_role`, `link_tw`, `link_wrap`,
                     `contact`) VALUES (NULL, 'nobanned', 'img/demo/authors/josh.png', 'Jos K.', 'Jos K. (ASP.NET Developer)',
                                        'Partner &amp; Contributor', '@atlantez', 'https://wrapbootstrap.com/user/Walapa',
                                        'Contact Jos')";

$create_jovanni = "INSERT INTO `users` (`id`, `status`, `img`, `alt`, `title_name`, `title_role`, `link_tw`, `link_wrap`,
                     `contact`) VALUES (NULL, 'banned', 'img/demo/authors/jovanni.png', 'Jovanni Lo', 'Jovanni L. (PHP Developer)',
                                        'Partner &amp; Contributor', '@lodev09t', 'https://wrapbootstrap.com/user/lodev09',
                                        'Contact Jovanni')";

$create_roberto = "INSERT INTO `users` (`id`, `status`, `img`, `alt`, `title_name`, `title_role`, `link_tw`, `link_wrap`,
                     `contact`) VALUES (NULL, 'banned', 'img/demo/authors/roberto.png', 'Roberto R', 'Roberto R. (Rails Developer)',
                                        'Partner &amp; Contributor', '@sildur', 'https://wrapbootstrap.com/user/sildur',
                                        'Contact Roberto')";

$arr_sql = [$create_table, $create_sanny, $create_jos, $create_jovanni, $create_roberto];
foreach ($arr_sql as $value){
    $pdo->query($value);
}
$pdo=null;




