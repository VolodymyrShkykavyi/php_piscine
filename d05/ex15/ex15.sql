SELECT REVERSE(RIGHT(`distrib`.`phone_number`, LENGTH(`distrib`.`phone_number`) - 1)) AS `rebmunenohp`
FROM `distrib`
WHERE `distrib`.`phone_number` LIKE '05%';