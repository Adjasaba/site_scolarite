-- Active: 1694607739608@@127.0.0.1@3306@scolarite_iris_2024
drop database if exists scolarite_iris_2025;
create database scolarite_iris_2025;
use scolarite_iris_2025;
 
create table classe (
    idclasse int (3) not null auto_increment,
    nom varchar(100),
    salle varchar(100),
    diplome varchar(1000),
    primary key (idclasse)
);
 
create table etudiant(
    idetudiant int (3) not null auto_increment,
    nom varchar(100),
    prenom varchar(100),
    email varchar(100),
    dateNais date ,
    statut enum ("alternant","initial"),
    idclasse int (3) not null,
    primary key(idetudiant),
    foreign key (idclasse) references classe (idclasse)
);
create table professeur (
    idprofesseur int (3) not null auto_increment,
   nom varchar(100),
    prenom varchar(100),
    email varchar(100),
    diplome varchar(100),
    primary key (idprofesseur)
);
 
create table enseignement(
    idenseignement int (3) not null auto_increment,
    matiere varchar (100),
    nbheures int (5),
    coeff int (2),
    idclasse int (3) not null,
    idprofesseur int (3) not null,
    primary key (idenseignement),
    foreign key (idclasse) references classe (idclasse),
    foreign key (idprofesseur) references professeur (idprofesseur)
);
 create table user (
    iduser int (3) not null auto_increment,
    nom varchar (50),
    prenom varchar (50),
    email varchar (50),
    mdp varchar (255),
    role enum ("admin","user"),
    primary key (iduser)
 );
 insert into user values
 (null, "Olivier","Paul","a@gmail.com","123","admin"),
 (null,"Marie","Lucie","b@gmail.com","456","user");
 
 create view inscription as (
    select e.nom, e.prenom, c.nom as classe, C.diplome,
    ens.matiere
    from etudiant e, classe c, enseignement ens
    where e.idclasse = c.idclasse
    and c.idclasse =ens.idclasse
 );
 
/*procedure stockee : suppresssion une classe */
DELIMITER $
create procedure deleteClasse (IN p_idclasse int)
BEGIN
/* suppression de tous les enseignements lier a cette classe */
delete from enseignement where idclasse = p_idclasse ;
/* suppression de tous les etudiants lier a cette classe*/
delete from etudiant where idclasse = p_idclasse ;
/* suppression de la classe*/
delete from classe where idclasse = p_idclasse ;
end $
delimiter ;
 
Drop procedure if exists insertClasse;
delimiter $
create procedure  insertClasse (IN p_nom varchar(50),
IN p_salle varchar(50), IN p_diplome varchar(50))
begin
if p_salle = "" or p_salle is null then
set p_salle = "salle 3.10";
end if ;
if p_diplome = "" or p_diplome is null then
set p_diplome = "BTS SIO" ;
end if ;
select count (*) into nb from classe where 
nom = p_nom ;
if nb = 0 then 
insert into classe values (null, p_nom, p_salle, p_diplome);
end if ;
end $
delimiter ;
 
call insertClasse ("master3","","");
