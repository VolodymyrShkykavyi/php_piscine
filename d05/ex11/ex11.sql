SELECT UPPER(`last_name`) AS `NAME`, `first_name`, `price`
FROM `user_card`, `member`, `subscription`
WHERE `member`.`id_user_card` = `user_card`.`id_user`
AND `member`.`id_sub` = `subscription`.`id_sub`
AND `subscription`.`price` > 42
ORDER BY `last_name`, `first_name`;
