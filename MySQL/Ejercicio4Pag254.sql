USE WORLD;
-- 1) El país con la ciudad mas poblada del mundo:
SELECT Name, population 
FROM country 
where population = (select max(population) as MAX from city
where country.code=city.countrycode);


-- 2) Los paises del continente europeo donde se habla español(usa una subquery
-- para determinar que paises (por codigo) hablan español, entonces comparalos
-- con los códigos del continente europeo para sacar a los no europeos. 
-- ¿Se puede hacer sin subquery?



-- 3) Qué continentes tiene paises en los que más del 50% de la población habla ingles?
-- ¿es una query correlativa? Porqué?




-- 4)



