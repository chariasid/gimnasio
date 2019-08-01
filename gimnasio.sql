
Create table socio(
	num_socio	int(5) primary key,
	dni		varchar(9) unique not null,
	nombre		varchar(30) not null,
	apellidos	varchar(70) not null,
	email		varchar(70),
	telefono	varchar(9),
	fecha_nac	date,
	usuario		varchar(20) unique,
	contraseña	varchar(10),
	estado		char(1) check (estado = 'a' or estado = 'i')
);


Create table recepcionista(
	dni		varchar(9) primary key,
	nombre		varchar(30) not null,
	apellidos	varchar(70) not null,
	email		varchar(70),
	usuario		varchar(20) unique,
	contraseña	varchar(10),
	estado		char(1) check (estado = 'a' or estado = 'i')
);


Create table pago(
	num_pago	int(8) primary key,
	fecha_pago	date,
	cuantia		decimal(5,2) check (cuantia >= 50),
	dni		varchar(9) unique not null, 
	num_socio	int(5) not null,
constraint fk_pag_rec foreign key (dni) references recepcionista(dni),
constraint fk_pag_soc foreign key (num_socio) references socio(num_socio) 
);

Create table actividad(
cod_actividad	int(3) primary key,
nombre		varchar(30) not null,
descripcion	varchar(100) not null,
precio		decimal(4,2) not null check (precio >=0),
estado		char(1) check (estado = 'a' or estado = 'i')
);

Create table aula(
num_aula	int(3) primary key,
tamaño		int(3) not null check(tamaño>0),
capacidad	int(2) not null check(capacidad>0),
estado		char(1) check (estado = 'a' or estado = 'i')
);


Create table monitor(
dni		varchar(9) primary key,
nombre		varchar(30) not null,
	apellidos	varchar(70) not null,
	email		varchar(70),
	usuario		varchar(20) unique,
	contraseña	varchar(10),
	estado		char(1) check (estado = 'a' or estado = 'i'));


Create table clase(
	cod_clase	int(3) primary key,
	fecha_inicio	date not null,
	fecha_fin	date,
	hora_inicio	time not null,
	hora_fin	time not null,
	cod_actividad	int(3) not null,
	num_aula	int(3) not null,
	dni		varchar(9),
constraint fk_cla_act foreign key (cod_actividad) references actividad(cod_actividad),
constraint fk_cla_aul foreign key (num_aula) references aula(num_aula),
constraint fk_cla_mon foreign key (dni) references monitor(dni)
);



Create table apunta(
	num_socio	int(3),
	cod_clase	int(3),
	fecha_inicio	date,
	fecha_fin	date,
constraint pk_apunta primary key (num_socio, cod_clase, fecha_inicio),
constraint fk_apu_soc foreign key (num_socio) references socio(num_socio),
constraint fk_apu_cla foreign key (cod_clase) references clase(cod_clase)
);

Create table puede_impartir(
	dni		varchar(9),
	cod_actividad	int(3),
constraint pk_puede_impartir primary key (dni, cod_actividad),
constraint fk_pue_mon foreign key (dni) references monitor(dni),
constraint fk_pue_act foreign key (cod_actividad) references actividad(cod_actividad)
);
