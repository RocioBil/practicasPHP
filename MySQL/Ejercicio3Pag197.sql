use world;
select Continent,avg(LifeExpectancy) from country group by(continent);
-- La media de esperanza de vida en cada continente

select now(), now()+interval 500 day;
-- me enseña el día de hoy y el día dentro de 500 días.

???!!!select (now('%W'), (now('%W')+interval 500 day);???!!!
-- me enseña el día la semana de hoy y el día la semana dentro de 500 días.

select Continent, sum(population) 
from country 
group by (continent);
-- la población total de cada continente

select distinct GovernmentForm,count(GovernmentForm) 
from country 
group by(GovernmentForm) 
order by count(GovernmentForm) 
desc limit 5;
-- las 5 formas de gobierno más comunes en el mundo

select Continent,avg(SurfaceArea) 
from country 
group by(continent);
-- me enseña la extensión total de cada continente

select Country.Name, City.CountryCode 
from Country 
inner join City 
on Country.Name=City.Name;
-- me coge los countrycodes de la tabla city y los name de la Country donde 
-- el name de country = name de city


