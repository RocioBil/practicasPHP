use world;

create table big_cities select id,name,population 
as big_population from city where population>8000000;
-- crea la tabla big_cities a partir de city, de la que coge 
-- si id, name y población siempre que sea mayor de 8 millones.

SELECT * FROM world.big_cities;
-- me enseña la tabla big_cities

alter table big_cities add column date_foundation 
date not null after big_population;
-- añade la columna date_foundation con los valores date y 
-- not null, despues de big_population

alter table big_cities drop column date_foundation;
-- tira la columna date

alter table big_cities modify column id int not null;
 -- modifica el id y me lo pones como un int not null

alter table big_cities add primary key (id); 
-- ponme el id como primary key

alter table big_cities add index pop (big_population);
-- añade a la columna big_populaton el indice pop

show create table big_cities;
-- enseñame las características de big_cities pa ver si he puesto 
-- su indice y todo bien

alter table big_cities drop index pop; 
-- elimina el indice pop que acabo de crear hace un ratillo

drop table if exists big_cities;
-- elimina la tabla big_cities