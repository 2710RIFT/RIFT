create table Customer
(	email varchar(50),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	type varchar(10),
	password varchar(50),
	primary key (email)
);

create table Home
(	email varchar(50),
	name	varchar(50),
	gender varchar(10),
	bday date,
	marital varchar(50),
	primary key (email),
	foreign key (email) references Customer(email) 
	on delete cascade
);

create table Business
( email varchar(50),
	name	varchar(50),
	gross_income varchar(255),
	category varchar(50),
	primary key (email),
	foreign key (email) references Customer (email)
	on delete cascade
);

create table Product
(	pid varchar(8),
	name varchar(50),
	gender varchar(8),
	price integer,
	type varchar(30),
	inventory_amount integer,
	primary key(pid)
);

create table Store
(	sid	varchar(10), 
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	num_of_employee	numeric(5,0),
	rid	varchar(7) not null,
	mid	varchar(10), 
	primary key (sid)
);

create table Region_manager
(	mid			varchar(10), 
  name	varchar(50),
  salary			numeric(8,2), 
	email		varchar(30),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	rid			varchar(7) not null,
	password varchar(50),
	primary key (mid)
);

create table Region
(	 region varchar(50),
	 rid varchar(7),
	 mid varchar(10),
	 primary key (rid),
	 foreign key (mid) references Region_manager (mid)
	on delete set null
);

alter table Store
add foreign key (rid) references Region(rid);

alter table Region_manager
add foreign key (rid) references Region(rid)
on delete cascade;

create table Store_manager
(	mid			varchar(10), 
  name	varchar(50),
  salary			numeric(8,2), 
	email		varchar(30),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	sid	varchar(10) not null,
	password varchar(50), 
	primary key (mid),
	foreign key (sid) references Store(sid)
	on delete cascade
);

alter table Store
add foreign key (mid) references Store_manager(mid);


create table Salesperson
(	eid	varchar(10), 
 	name	varchar(50),
	salary numeric(8,2), 
	email	varchar(30),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	sid	varchar(10) not null,
	password varchar(50),
	primary key (eid),
	foreign key (sid) references Store (sid)	
);

create table Transaction
(	tid varchar(7),
	date varchar(10),
	total_price decimal(10,2) unsigned,
	total_quantity integer,
	email varchar(50) not null,
	primary key(tid),
	foreign key (email) references Customer(email) on delete cascade
);

create table Invoice
(	i_id varchar(7),
	quantity integer,
	price decimal(10,2) unsigned,
	tid varchar(7) not null,
	pid varchar(8) not null,
	foreign key (tid) references Transaction (tid) on delete cascade,
	foreign key (pid) references Product (pid) on delete cascade
);