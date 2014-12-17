use tienda;
-- 1. Obtener todos detalles de todos los artículos de Cáceres.OK
select * from articulos where ciudad = 'caceres';


-- 2. Obtener todos los valores de #P para los proveedores 
-- que abastecen el artículo T1.OK
select p from envios where t= 't1'; 


-- 3. Obtener la lista de pares de atributos (COLOR, CIUDAD) de la tabla 
-- componentes eliminando los pares duplicados.OK
select distinct color,ciudad from componentes;


-- 4. Obtener de la tabla de artículos los valores de T# y CIUDAD donde 
-- el nombre de la ciudad acaba en D o contiene al menos una E.
select t,ciudad from articulos where ciudad like '%d%' or ciudad like '%e%';


-- 5. Obtener los valores de P# para los proveedores que suministran para 
-- el artículo T1 el componente Cl.
select p from envios where t='t1' and c='c1';


-- 6. Obtener los valores de TNOMBRE en orden alfabético para los artículos
-- abastecidos por el proveedor P1.
select TNombre
from articulos inner join envios
on articulos.t='t1' or articulos.t='t4' and p='p1'
group by tnombre order by tnombre asc;

select distinct tnombre from articulos, envios
where articulos.t='t1' or articulos.t='t4' and p='p1'
order by tnombre asc;

select TNombre
from articulos inner join envios
on articulos.t= envios.t
where envios.p='p1'
order by tnombre;


-- 7. Obtener los valores de C# para los componentes suministrados para cualquier
-- articulo de MADRID.OK
select distinct c
from envios inner join articulos
on articulos.t = envios.t 
where articulos.ciudad = 'madrid';



-- 8. Obtener todos los valores de C# de los componentes tales que ningún otro
-- componente tenga un valor de peso inferior. meto el min peso en una subquery
-- porque si lo dejo fuera me coge solo 1 minimo peso agrupado (me da un solo valor)
-- y al meterla en la subquery le obligo con el select de fuera a q me devuelva los c
-- OK
select c
from componentes
where peso = (select min(peso) from componentes);


-- 9. Obtener los valores de P# para los proveedores que suministren los 
-- artículos T1 yT2. solución: p2 Y P3.
-- select p from envios where t='t1';
-- select p from envios where t='t2';
-- OK

select distinct Q1.p  from 
(select p from envios where t='t1') as Q1
join 
(select p from envios where t='t2') as Q2
where Q1.p = Q2.p;

ó

select distinct Q1.p  from 
(select p from envios where t='t1') as Q1
inner join 
(select p from envios where t='t2') as Q2
on Q1.p = Q2.p;

ó

select distinct p from envios
where 
p in(select p from envios where t='t1')
and 
p in(select p from envios where t='t2');

-- 10. Obtener los valores de P# para los proveedores que suministran para 
-- un artículo de SEVILLA o MADRID un componente ROJO.solución: P1 Y P4. OK 


select p from componentes
inner join envios on componentes.c = envios.c
inner join articulos on envios.t = articulos.t
where componentes.color = 'rojo'
and (articulos.ciudad = 'sevilla' or articulos.ciudad = 'madrid');


-- 11. Obtener mediante subconsultas los valores de C# para los componentes
-- suministrados para algún artículo de SEVILLA por un proveedor de SEVILLA.
-- solución: C6 2 SUBQUERY

select c from envios 
where p in(select p from proveedores where ciudad = 'sevilla')
and t in(select t from articulos where ciudad = 'sevilla')
group by c;


-- 12. Obtener los valores para los artículos que usan al menos un componente 
-- que se puede obtener con el proveedor P1. solución: T1 Y T4
select t from envios
where t in(select t from componentes where ciudad='sevilla')
and p in (select p from proveedores where p='p1')
group by t;


-- 13. Obtener todas las ternas (CIUDAD, C#, CIUDAD) tales que un proveedor de 
-- la accessible ciudad suministre el componente especificado para un artículo 
-- montado en la segunda ciudad. Solución: 24 filas, es muy largo para decirlo entero
select proveedores.ciudad, envios.c, articulos.ciudad 
from proveedores 
inner join envios on proveedores.p=envios.p 
inner join articulos on articulos.t=envios.t;


-- 14. Repetir el ejercicio anterior pero sin recuperar las ternas en los que 
-- los dos valores de ciudad sean los mismos. Solución: 15 filas
select proveedores.ciudad, envios.c, articulos.ciudad 
from proveedores 
inner join envios on proveedores.p=envios.p 
inner join articulos on articulos.t=envios.t
where proveedores.ciudad!=articulos.ciudad;


-- 15. Obtener el número de suministros, el de artículos distintos suministrados
-- y la cantidad total de artículos suministrados por el proveedor P2.
-- Solución: 8 suministros, 7 articulos, 3200 total suministrados
select count(p), count(distinct t),sum(cantidad) from envios where p='p2';




-- 16.Para cada artículo y componente suministrado obtener los valores de C#, T# 
-- y la cantidad total correspondiente. Solución: 21 filas
cuando c y t son iguales, quiero saber la cantidad que le corresponde

select c,t,sum(cantidad) 
from envios 



-- 17.Obtener los valores de T# de los artículos abastecidos al menos por un 
-- proveedor que no viva en MADRID y que no esté en la misma ciudad en la que 
-- se monta el artículo. Solución: t1 t2 t3 t4 t5 y t7.



-- 18. Obtener los valores de P# para los proveedores que suministran al menos un 
-- componente suministrado al menos por un proveedor que suministra al menos un 
-- componente ROJO. Solución: p1 p2 p3 p4 y p5.



-- 19.Obtener los identificadores de artículos, T#, para los que se ha suministrado 
-- algún componente del que se haya suministrado una media superior a 320 artículos.
-- Solución: t1 t2 t3 t4 t5 y t6


-- 20.Seleccionar los identificadores de proveedores que hayan realizado algún envío con 
-- Cantidad mayor que la media de los envíos realizados para el componente a que 
-- corresponda dicho envío. Solución: p1 p2 y p5.



-- 21. Seleccionar los identificadores de componentes suministrados para el artículo 'T2' 
-- por el  proveedor 'P2'.



-- 22.Seleccionar todos los datos de los envíos realizados de componentes cuyo color no 
-- sea 'ROJO'.



-- 23.Seleccionar los identificadores de componentes que se suministren para los artículos 
-- 'T1' y 'T2'.



-- 24.Seleccionar el identificador de proveedor y el número de envíos de componentes de 
-- color 'ROJO' llevados a cabo por cada proveedor.



-- 25.Seleccionar los colores de componentes suministrados por el proveedor 'P1'.



-- 26.Seleccionar los datos de envío y nombre de ciudad de aquellos envíos que cumplan 
-- que el artículo, proveedor y componente son de la misma ciudad.



-- 27.Seleccionar los nombres de los componentes que son suministrados en una cantidad 
-- total superior a 500.



-- 28.Seleccionar los identificadores de proveedores que residan en Sevilla y no 
-- suministren más de dos artículos distintos.



-- 29.Seleccionar los identificadores de artículos para los cuales todos sus componentes 
-- se fabrican en una misma ciudad.



-- 30.Seleccionar los identificadores de artículos para los que se provean envíos de todos 
-- los componentes existentes en la base de datos.



-- 31.Seleccionar los códigos de proveedor y artículo que suministran al menos dos 
-- componentes de color 'ROJO'.



-- 32.Propón tu mismo consultas que puedan realizarse sobre esta base de datos de ejemplo. 
-- Intenta responderla, y si te parece un problema interesante o no estás seguro de su 
-- solución, puedes exponerlos en la clases prácticas para su resolución en grupo. 



