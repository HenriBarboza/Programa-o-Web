drop database if exists escola;
create database escola;
use escola;

create table aluno
   (id int not null auto_increment,
    nome varchar(40),
    idade int,
    cpf int(11),
    primary key (id)
   );

create table professor
	(id int not null auto_increment,
    nome varchar(40),
    cpf int(11),
    carga_horaria int,
    formacao varchar(150),
    primary key (id)
);

create table curso
   (id int not null auto_increment,
    id_professor int not null,
    nome varchar(40),
    sala int,
    horario time,
    primary key (id),
	foreign key (id_professor) references professor(id)
   );

create table matricula
   (id_alu int not null,
    id_cur int not null,
	 periodo varchar(30),
    data_matricula timestamp default current_timestamp,
    primary key (id_alu, id_cur),
    foreign key (id_alu) references aluno (id),
    foreign key (id_cur) references curso (id)
   );
   
insert into aluno (nome, idade, cpf) values ('João da Silva', 18, 62513025342);
insert into aluno (nome, idade, cpf) values ('Pedro Costa', 20, 87622844101);
insert into aluno (nome, idade, cpf) values ('Ana Rita', 21, 12739994877);
insert into aluno (nome, idade, cpf) values ('Fabiano Oliveira', 19, 51724689436);

insert into professor (nome, cpf, carga_horaria, formacao) values ('Antonio Ramos', 76520175307, 22, 'Bacharelado em administração');
insert into professor (nome, cpf, carga_horaria, formacao) values ('Luana Santos', 85639868643, 32, 'Bacharelado em Ciência da Computação');
insert into professor (nome, cpf, carga_horaria, formacao) values ('Ingrid Dias', 28277116306, 38, 'Mestrado em inteligência artificial');

insert into curso (id_professor, nome, sala, horario) values (2,'Web Designer', 10, '19:00');
insert into curso (id_professor, nome, sala, horario)  values (2,'Pacote Office', 11, '8:00');
insert into curso (id_professor, nome, sala, horario)  values (3,'Internet', 12, '14:00');
insert into curso (id_professor, nome, sala, horario)  values (1,'Excel', 10, '15:30');

insert into matricula (id_alu, id_cur,periodo) values (1, 1, 'Noturno');
insert into matricula (id_alu, id_cur,periodo) values (2, 2, 'Manhã');
insert into matricula (id_alu, id_cur,periodo) values (3, 2, 'Manhã');
insert into matricula (id_alu, id_cur,periodo)  values (2, 3, 'Tarde');
insert into matricula (id_alu, id_cur,periodo)  values (3, 4, 'Noturno');


   
   