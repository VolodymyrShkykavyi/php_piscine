SELECT `genre`.`id_genre`, `genre`.`name` AS `name_genre`,
  `distrib`.`id_distrib`, `distrib`.`name` AS `name_distrib`, `film`.title AS `title_film`
FROM `film`
JOIN `genre` ON `film`.`id_genre` = `genre`.`id_genre`
JOIN `distrib` ON `distrib`.`id_distrib` = `film`.`id_distrib`;