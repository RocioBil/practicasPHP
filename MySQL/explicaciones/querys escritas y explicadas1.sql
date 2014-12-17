-- SUBQUERYS: VAN MAS LENTAS QUE LOS JOINS
use world;

-- correlacionadas: la subquery depende de la query principal
select name from city 
where countrycode in (select code from country where continent = 'Oceania');
select code from country where continent = 'Oceania';-- ESTA NO FUNCIONA SOLA

-- esta es igual...
select country.name, (select count(*) from city 
where countrycode = country.code) as citycount from country
order by country.name;

-- a esta:
select country.name, count(city.countrycode) 
from country left join city 
on country.code = city.countrycode
group by country.name order by country.name;
-- SI LE AÑADO ININDICE A country.code Y A city.countrycode LA CONSULTA SE ACELERARÁ MUCHO
-- POR ESTAR USANDO INDICES APLICADOS SOBRE LAS DOS COLUMNAS SOBRE LAS QUE TIENE QUE BUSCAR
-- en esta introducimos el (CASE WHEN-THEN-ELSE-END)
select country.name, city.countrycode,
(case when city.countrycode is null then 0 else count(*) end)
from country left join city on country.code = city.countrycode
group by country.name order by country.name;

select name from city where population > 
(select population from city where name='Tokyo');
select population from city where name='Tokyo';

select name from city where population > 
(select population from city where countrycode='esp');

select avg(cont_sum)
from (select continent, SUM(population) AS cont_sum
from country group by continent)
as t;
-- ejercicio para nota: hacer esto mismo con un join
SELECT Continent, Name, Population
FROM country c
where population = (select max(population) from country c2
where c.Continent=c2.Continent and population > 0);

-- ALL: dame todas las ciudades cuya población sea mayor que todas 
-- (=MAX) las ciudades de China:


select name, Population from city where population >
ALL (sELECT POPULATION FROM CITY WHERE COUNTRYCODE='chn');

-- ANY: SELECCIONA LOS PAISES DE EUROPA DONDE EL CODIGO SEA IGUAL 
-- a alguno de los que se habla español(=MIN)
select name from country where continent='Europe' and code =
ANY (SELECT countrycode FROM countrylanguage WHERE language='Spanish')
order by name;

-- y lo mismo con joins:
select name from country inner join countrylanguage
on country.code = countrylanguage.CountryCode
where countrylanguage.language = 'spanish'
and country.continent = 'europe';

-- EXISTS / NOT EXISTS nos dice si hay valor o si no, esto es, si la
-- subquery devielve algo o no. Con que devuelva uno, es suficiente:
-- verifica que haya alguna fila resultante y, si la hay, la muestra.
-- ¿Existe alguna ciudad en la que su código sea igual countrycode y que
-- la población sea mayor a 8000000? Si la hay, muéstramela con su continente.
use world;
Select continent from country 
where EXISTS (Select * from city where code = 
countrycode and population >8000000)
group by continent;

-- con joins:
select continent
from country inner join city
on countrycode = code and city.population>8000000
group by continent;

-- el máximo de población (en primero que encuentre, ojo, porque estoy agrupando 
-- y además estoy usando una función agregada)que hay en la ciudad con más 
-- población de cada continente:
select continent, max(city.population)
from country inner join city
on countrycode = code and city.population>8000000
group by continent;

-- el máximo de población que hay en la ciudad con más población de cada continente:
select continent, city.population, country.name
from country inner join city
on countrycode = code 
group by continent;

-- NOT IN: Te elije las filas en las que NO HAY coincidencias:
-- los países en los que no hay un idioma (countrylanguage) oficial:
SELECT NAME FROM COUNTRY WHERE CODE NOT IN
(select countrycode from countrylanguage);

-- con join: países que tienen un código de país, pero que su código de lenguage 
-- :es nulo
select name from country  
left join countrylanguage 
on code=countrycode
where countrycode is null;










