SELECT COUNT(*) AS `nb_susc`, CEIL(AVG(`price`)) AS `av_susc`, MOD(SUM(`duration_sub`), 42) AS `ft`
FROM `subscription`;