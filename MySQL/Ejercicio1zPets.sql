use pets;

drop table if exists pet_info; 
-- si existe, elimina la tabla pet_info

create table pet_info 
(id integer not null auto_increment primary key,
pet_name varchar(20) not null,
owners varchar(20) not null,
pet_type varchar(20) not null,
pet_bday date null,
pet_dday date null,
gender char(3) null);
-- crea la tabla pet_info
-- (con esta columna y sus values,
-- (y con esta otra columna y sus values);


insert into pet_info (pet_name,owners,pet_type,pet_bday,pet_dday, gender) values 
('Fluffy','Harold','Cat','1993-02-04',null,'f'), 
('Claws','Gwen','Cat','1994-03-17',null,'m'), 
('Buffy','Harold','Dog','1989-05-13',null,'f'), 
('Fang','Benny','Dog','1990-08-27',null,'m'),
('Bowser','Diane','Dog','1979-08-31','1999-07-29','m'),
('Chirpy','Gwen','Parrot','1998-09-11',null,'f'),
('Whistler','Gwen','Canary','1997-12-09',null, null),
('Slim','Benny','Snake','1996-04-29',null,'m'),
('Puffball','Diane','Hamster','1999-03-30',null,'f'),
('Opus','Caryn','Ferret',null,null,'m'),
('Rochy','Chris','Dog','1988-04-04','2004-02-11','m'),
('Koko','Benny','Dog','1987-02-08',null,'m'),
('Scruffy','Gwen','Cat','1998-04-17',null,'m');
-- inserta en pet_info (en estas columnas) values 
-- (estos datos, estos datos);

SELECT `pet_info`.`id`,
    `pet_info`.`pet_name`,
    `pet_info`.`owners`,
    `pet_info`.`pet_type`,
    `pet_info`.`pet_bday`,
    `pet_info`.`pet_dday`,
    `pet_info`.`gender`
FROM `pets`.`pet_info`;
-- enséñame pet_info a ver cómo se ha metido todo

drop table if exists owners; 
-- tira, si existe la tabla owners

create table owners 
(owners varchar(20) not null primary key,
phone varchar(20) not null);
-- crea la tabla owners 
-- (con esta columna y sus values,
-- (y con esta otra columna y sus values);

insert into owners (owners,phone) values 
('Harold','155587496852'),
('Gwen','154796157874'),
('Benny','168517963548'),
('Diane','138496571254'),
('Caryn','139587659596'),
('Chris','133687458966');
-- insertame en owners (en estas columnas) los valores 
-- (estos datos, estos datos);

drop table if exists pet_types; 
-- si existe elimina pet_types

create table pet_types 
(pet_types varchar(20) not null primary key,
pet_category varchar(20) not null);
-- crea la tabla pet_types 
-- (con esta columna y sus values,
-- (y con esta otra columna y sus values);

insert into pet_types (pet_types,pet_category) values 
('Cat','Mammal'),
('Dog','Mammal'),
('Parrot','Bird'),
('Canary','Bird'),
('Snake','Reptile'),
('Hamster','Mammal'),
('Ferret','Mammal');
-- insertame en pet_types (en estas columnas) los valores 
-- (estos datos, estos datos);

update pet_info set gender= 'm' where id=7;
update pet_info set pet_type='iguana' where id=8;
update pet_types set pet_types='iguana' where pet_types='snake';
update pet_info set owners='Benny' where id=3;
update owners set phone='16163429988' where owners='Caryn' or owners='Chris';
-- actualiza al mismo tiempo el mismo teléfono para Caryn y para Chris: OR

alter table pet_info add index bday(pet_bday);
-- asigna a la columna pet_bday un índice, para poder actualizar la tabla
-- en base a esa columna, si no el sistema no me deja porque estoy en modo
-- safe_updates=1;

delete from pet_info where pet_bday<'1990-01-01';
-- borro de la tabla los animales nacidos antes del 1990 usando la columna
-- a la que antes le di un indice. El indice nop se usa NUNCA en la query,
-- es sólo útil para el sistema.

replace into pet_info (id, pet_name, owners, pet_type, pet_bday, pet_dday, gender) 
values (9, 'Chewy', 'Olga', 'Hamster', null, null, 'f');



