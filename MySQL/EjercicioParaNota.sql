-- SUBQUERYS:
use world;

-- ejercicio para nota: hacer esto mismo con un join:
-- los paises con mayor población de cada continente
SELECT Continent, Name, Population
FROM country c
where population = (select max(population) from country c2
where c.Continent=c2.Continent and population > 0);

select c.continent, c.name, c.population
from country c inner join 
(select continent, max(population) as MAX from country c2)
on c.population = c2.MAX
group by continent;




/*Solución internet:
SELECT c1.continent, c1.NAME, c1.population 
FROM country c1 
INNER JOIN
(
   SELECT continent, MAX(population) AS Maxp
   FROM country
   WHERE population > 0
   GROUP BY continent
) AS c2  ON c1.population = c2.maxp 
        AND c1.continent  = c2.continent;*/






