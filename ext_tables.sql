#
# Table structure for table 'elc_etapas'
#
CREATE TABLE elc_etapas (

	uid int(11) NOT NULL AUTO_INCREMENT,
	name tinytext,
	email tinytext,
	erstelltvonschule tinytext,
	erproptvonschule tinytext,
	faecher tinytext,
	schulstufe int(11) DEFAULT '0',
	vorkenntnisse text,
	technischevoraussetzungen text,
	handlungsdimensionen varchar(250) DEFAULT NULL,
	relevantedeskriptoren text,
	zeitbedarf tinytext,
	message text,
	lizenstype tinytext,
	file tinytext,
	pid int(11) NOT NULL DEFAULT '0',
	deleted tinyint(4) NOT NULL DEFAULT '0',
	hidden tinyint(4) NOT NULL DEFAULT '0',
	kurzbezeichnung tinytext,
	position varchar(250) NOT NULL,
	relevantedeskriptoren_link text,
	weblink tinytext,
	top tinyint(4) NOT NULL DEFAULT '0',
	materialmedienbedarf varchar(250) NOT NULL,
	namensnennung_type varchar(10) NOT NULL,
	kommerziellenutzung_type varchar(10) NOT NULL,
	bearbeitung_type varchar(10) NOT NULL,
	weitergabe_type varchar(10) NOT NULL,
	lizensaccept int(2) DEFAULT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid)
);
