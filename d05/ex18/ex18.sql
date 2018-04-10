SELECT *
FROM `distrib`
WHERE `id_distrib` IN (42, 71, 88, 89, 90)
OR (`id_distrib` >= 62 AND `id_distrib` <= 69)
OR LOWER(`name`) LIKE '%y%y%'
LIMIT 2, 5;