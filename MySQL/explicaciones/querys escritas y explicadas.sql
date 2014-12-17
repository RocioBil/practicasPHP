							Mantenimiento de la BBDD
drop database nombre BBDD;
drop database if exists nombreBBDD;
-- para eliminar una BBDD. OJITO que no tiene vuelta atrás.

create table nueva Tabla select columna(s) que quiero q tenga as newcolumna 
from tabla vieja where columna x 1.5, ó >250... ;
-- me crea una nueva tabla a partir de otra PERO cambiando la columna que quiera
-- en base a una columna de la tabla antigua.

create table newTable like oldTable;
-- me crea una tabla igualita que otra.

drop table nombre tabla;
drop table if exists nombre tabla;
-- para eliminar una tabla. OJITO que no tiene vuelta atrás.

alter table tabla add column NombreColumna Valores;
alter table tabla add column NombreColumna Valores first la Columna Tal;
alter table tabla add column NombreColumna Valores after la Columna Tal;
-- me añade una columna en la tabla que sea.

alter table tabla drop column NombreColumna;
-- para eliminar una columna de tal tabla. OJITO que no tiene vuelta atrás.

alter table tabla modify column NombreColumna Valores;
-- para modificar una columna. 

alter table tabla add index Nombre Indice (columna(s) indice);
alter table tabla add unique Nombre Indice (columna(s) indice);
alter table tabla add primary key Columna Indice;
-- para añadir indices, uniques o primary keys.

alter table tabla drop index Nombre Indice;
-- para eliminar indices, uniques o primary keys.

show create table nombre tabla;
-- me enseña los indices y todo lo de la tabla.




